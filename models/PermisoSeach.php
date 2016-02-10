<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblPermiso;

/**
 * PermisoSeach represents the model behind the search form about `app\models\TblPermiso`.
 */
class PermisoSeach extends TblPermiso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tipopermiso', 'activo', 'id_funcionario'], 'integer'],
            [['fechaini', 'fechafin'], 'safe'],
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
        $query = TblPermiso::find();

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
            'tipopermiso' => $this->tipopermiso,
            'fechaini' => $this->fechaini,
            'fechafin' => $this->fechafin,
            'activo' => $this->activo,
            'id_funcionario' => $this->id_funcionario,
        ]);

        return $dataProvider;
    }
}
