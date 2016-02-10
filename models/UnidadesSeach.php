<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblUnidades;

/**
 * UnidadesSeach represents the model behind the search form about `app\models\TblUnidades`.
 */
class UnidadesSeach extends TblUnidades
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_institucion', 'padre'], 'integer'],
            [['descrip', 'cite', 'nombre_cargo', 'categoria', 'estado_cargo', 'clasificacion'], 'safe'],
            [['haber_basico'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TblUnidades::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_institucion' => $this->id_institucion,
            'padre' => $this->padre,
            'haber_basico' => $this->haber_basico,
        ]);

        $query->andFilterWhere(['like', 'descrip', $this->descrip])
            ->andFilterWhere(['like', 'cite', $this->cite])
            ->andFilterWhere(['like', 'nombre_cargo', $this->nombre_cargo])
            ->andFilterWhere(['like', 'categoria', $this->categoria])
            ->andFilterWhere(['like', 'estado_cargo', $this->estado_cargo])
            ->andFilterWhere(['like', 'clasificacion', $this->clasificacion]);

        return $dataProvider;
    }
}
