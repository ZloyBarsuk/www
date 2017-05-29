<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LotNumber;

/**
 * LotNumberSearch represents the model behind the search form about `app\models\LotNumber`.
 */
class LotNumberSearch extends LotNumber
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'inv_id', 'prod_t_inv_id'], 'integer'],
            [['external_lot_number_en', 'external_lot_number_ua', 'alloc_quantity', 'location'], 'safe'],
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
        $query = LotNumber::find();

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
            'id' => $this->id,
            'inv_id' => $this->inv_id,
            'prod_t_inv_id' => $this->prod_t_inv_id,
        ]);

        $query->andFilterWhere(['like', 'external_lot_number_en', $this->external_lot_number_en])
            ->andFilterWhere(['like', 'external_lot_number_ua', $this->external_lot_number_ua])
            ->andFilterWhere(['like', 'alloc_quantity', $this->alloc_quantity])
            ->andFilterWhere(['like', 'location', $this->location]);

        return $dataProvider;
    }
}
