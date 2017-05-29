<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BankToContractor;

/**
 * BankToContractorSearch represents the model behind the search form about `app\models\BankToContractor`.
 */
class BankToContractorSearch extends BankToContractor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bank_contr_id', 'id_contractor', 'id_bank', 'created_at', 'active'], 'integer'],
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
        $query = BankToContractor::find();

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
            'bank_contr_id' => $this->bank_contr_id,
            'id_contractor' => $this->id_contractor,
            'id_bank' => $this->id_bank,
            'created_at' => $this->created_at,
            'active' => $this->active,
        ]);

        return $dataProvider;
    }
}
