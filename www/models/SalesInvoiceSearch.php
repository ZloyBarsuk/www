<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SalesInvoice;

/**
 * SalesInvoiceSearch represents the model behind the search form about `app\models\SalesInvoice`.
 */
class SalesInvoiceSearch extends SalesInvoice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'inv_id', 'prod_t_inv_id'], 'integer'],
            [['sales_order_confirmation', 'sales_of', 'delivery_note', 'delivery_of', 'departure_warehouse'], 'safe'],
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
        $query = SalesInvoice::find();

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
            'inv_id' => $this->inv_id,
            'prod_t_inv_id' => $this->prod_t_inv_id,
        ]);

        $query->andFilterWhere(['like', 'sales_order_confirmation', $this->sales_order_confirmation])
            ->andFilterWhere(['like', 'sales_of', $this->sales_of])
            ->andFilterWhere(['like', 'delivery_note', $this->delivery_note])
            ->andFilterWhere(['like', 'delivery_of', $this->delivery_of])
            ->andFilterWhere(['like', 'departure_warehouse', $this->departure_warehouse]);

        return $dataProvider;
    }
}
