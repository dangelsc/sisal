<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblUsuario;

/**
 * UsuarioSeach represents the model behind the search form about `app\models\TblUsuario`.
 */
class UsuarioSeach extends TblUsuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'iduser'], 'integer'],
            [['nom_usuario', 'contrasenia_usuario', 'estado_usuario'], 'safe'],
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
        $query = TblUsuario::find();

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
            'iduser' => $this->iduser,
        ]);

        $query->andFilterWhere(['like', 'nom_usuario', $this->nom_usuario])
            ->andFilterWhere(['like', 'contrasenia_usuario', $this->contrasenia_usuario])
            ->andFilterWhere(['like', 'estado_usuario', $this->estado_usuario]);

        return $dataProvider;
    }
}
