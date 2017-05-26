<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ContractorInfo;

/**
 * ContractorInfoSearch represents the model behind the search form about `app\models\ContractorInfo`.
 */
class ContractorInfoSearch extends ContractorInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contr_info_id', 'id_contractor', 'created_at', 'created_by'], 'integer'],
            [['adress_official_ua', 'adress_official_en', 'adress_post_ua', 'adress_post_en', 'director_ua', 'director_en', 'email', 'phone', 'fax', 'contact_person', 'tax_number', 'vat_reg_no', 'rep', 'customer_number'], 'safe'],
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
        $query = ContractorInfo::find();

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
            'contr_info_id' => $this->contr_info_id,
            'id_contractor' => $this->id_contractor,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'adress_official_ua', $this->adress_official_ua])
            ->andFilterWhere(['like', 'adress_official_en', $this->adress_official_en])
            ->andFilterWhere(['like', 'adress_post_ua', $this->adress_post_ua])
            ->andFilterWhere(['like', 'adress_post_en', $this->adress_post_en])
            ->andFilterWhere(['like', 'director_ua', $this->director_ua])
            ->andFilterWhere(['like', 'director_en', $this->director_en])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'contact_person', $this->contact_person])
            ->andFilterWhere(['like', 'tax_number', $this->tax_number])
            ->andFilterWhere(['like', 'vat_reg_no', $this->vat_reg_no])
            ->andFilterWhere(['like', 'rep', $this->rep])
            ->andFilterWhere(['like', 'customer_number', $this->customer_number]);

        return $dataProvider;
    }
}
