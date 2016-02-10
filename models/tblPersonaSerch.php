<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tblPersona;

/**
 * tblPersonaSerch represents the model behind the search form about `app\models\tblPersona`.
 */
class tblPersonaSerch extends tblPersona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['ci', 'ci_exp', 'nombres', 'ap_paterno', 'ap_materno', 'fech_naci', 'genero'], 'safe'],
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
        $query = tblPersona::find();

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
            'fech_naci' => $this->fech_naci,
        ]);

        $query->andFilterWhere(['like', 'ci', $this->ci])
            ->andFilterWhere(['like', 'ci_exp', $this->ci_exp])
            ->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'ap_paterno', $this->ap_paterno])
            ->andFilterWhere(['like', 'ap_materno', $this->ap_materno])
            ->andFilterWhere(['like', 'genero', $this->genero]);

        return $dataProvider;
    }
}
