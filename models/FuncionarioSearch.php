<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblFuncionario;

/**
 * FuncionarioSearch represents the model behind the search form about `app\models\TblFuncionario`.
 */
class FuncionarioSearch extends TblFuncionario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_unidad', 'item', 'antiguedad', 'id_tipoempleado', 'id_profesion'], 'integer'],
            [['nit','nombre','ci','fech_ingreso', 'estado', 'jefe_superior', 'estado_bono', 'subsidio', 'controltratamiento'], 'safe'],
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
        $query = TblFuncionario::find()->leftJoin('tbl_persona','tbl_funcionario.id=tbl_persona.id')
        ->with(['idProfesion','idFuncionario']);

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
            'id_unidad' => $this->id_unidad,
            'item' => $this->item,
            'fech_ingreso' => $this->fech_ingreso,
            'antiguedad' => $this->antiguedad,
            'id_tipoempleado' => $this->id_tipoempleado,
            'id_profesion' => $this->id_profesion,
        ]);

        $query->andFilterWhere(['like', 'nit', $this->nit])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'jefe_superior', $this->jefe_superior])
            ->andFilterWhere(['like', 'estado_bono', $this->estado_bono])
            ->andFilterWhere(['like', 'subsidio', $this->subsidio])
            ->andFilterWhere(['like', 'controltratamiento', $this->controltratamiento])
            ->andFilterWhere(['like', 'tbl_persona.ci', $this->ci])
            ->andFilterWhere(['like', 'tbl_persona.ap_paterno', $this->nombre])
            ->orFilterWhere(['like', 'tbl_persona.ap_materno', $this->nombre])
            ->orFilterWhere(['like', 'tbl_persona.nombres', $this->nombre]);

        return $dataProvider;
    }
}
