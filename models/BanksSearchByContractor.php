<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Banks;

/**
 * BanksSearch represents the model behind the search form about `app\models\Banks`.
 */
class BanksSearchByContractor extends Banks
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bank_id', 'created_by', 'contractor_id'], 'integer'],
            [['name_ua', 'name_en', 'inn', 'kpp', 'ogrm', 'adress_official_ua', 'adress_official_en', 'adress_post_ua', 'adress_post_en', 'r_s', 'k_s', 'bic', 'swift', 'account_type', 'created_at', 'by_default'], 'safe'],
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
        $query = Banks::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'bank_id' => $this->bank_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'contractor_id' => $this->contractor_id,
        ]);

        $query->andFilterWhere(['like', 'name_ua', $this->name_ua])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'kpp', $this->kpp])
            ->andFilterWhere(['like', 'ogrm', $this->ogrm])
            ->andFilterWhere(['like', 'adress_official_ua', $this->adress_official_ua])
            ->andFilterWhere(['like', 'adress_official_en', $this->adress_official_en])
            ->andFilterWhere(['like', 'adress_post_ua', $this->adress_post_ua])
            ->andFilterWhere(['like', 'adress_post_en', $this->adress_post_en])
            ->andFilterWhere(['like', 'r_s', $this->r_s])
            ->andFilterWhere(['like', 'k_s', $this->k_s])
            ->andFilterWhere(['like', 'bic', $this->bic])
            ->andFilterWhere(['like', 'swift', $this->swift])
            ->andFilterWhere(['like', 'account_type', $this->account_type])
            ->andFilterWhere(['like', 'by_default', $this->by_default]);

        return $dataProvider;
    }

}
