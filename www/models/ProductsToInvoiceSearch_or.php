<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductsToInvoice;

/**
 * ProductsToInvoiceSearch represents the model behind the search form about `app\models\ProductsToInvoice`.
 */
class ProductsToInvoiceSearch extends ProductsToInvoice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pr_to_inv_id', 'invoice_id', 'product_id'], 'integer'],
            [['item_number', 'remark', 'unit', 'created_at', 'updated_at'], 'safe'],
            [['quantity', 'unit_price_manual', 'total_price'], 'number'],
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
        $query = ProductsToInvoice::find();

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
            'pr_to_inv_id' => $this->pr_to_inv_id,
            'invoice_id' => $this->invoice_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'unit_price_manual' => $this->unit_price_manual,
            'total_price' => $this->total_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'item_number', $this->item_number])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'unit', $this->unit]);

        return $dataProvider;
    }
}
