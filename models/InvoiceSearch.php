<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Invoice;

/**
 * InvoiceSearch represents the model behind the search form about `app\models\Invoice`.
 */
class InvoiceSearch extends Invoice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_id', 'contractor_id', 'executor_id', 'doc_template_id', 'created_by', 'updated_by', 'dogovor_id'], 'integer'],
            [['number', 'order_number', 'purchase_order', 'warehouse_name', 'h_s_code', 'comment', 'net_weight', 'gross_weight', 'paletts_info', 'payment_item', 'shipment', 'delivery_terms', 'total_pcs', 'document_date', 'created_at', 'updated_at'], 'safe'],
            [['total_summ', 'freight'], 'number'],
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
        $query = Invoice::find();

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
            'invoice_id' => $this->invoice_id,
            'contractor_id' => $this->contractor_id,
            'executor_id' => $this->executor_id,
            'doc_template_id' => $this->doc_template_id,
            'total_summ' => $this->total_summ,
            'freight' => $this->freight,
            'document_date' => $this->document_date,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'dogovor_id' => $this->dogovor_id,
        ]);

        $query->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'order_number', $this->order_number])
            ->andFilterWhere(['like', 'purchase_order', $this->purchase_order])
            ->andFilterWhere(['like', 'warehouse_name', $this->warehouse_name])
            ->andFilterWhere(['like', 'h_s_code', $this->h_s_code])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'net_weight', $this->net_weight])
            ->andFilterWhere(['like', 'gross_weight', $this->gross_weight])
            ->andFilterWhere(['like', 'paletts_info', $this->paletts_info])
            ->andFilterWhere(['like', 'payment_item', $this->payment_item])
            ->andFilterWhere(['like', 'shipment', $this->shipment])
            ->andFilterWhere(['like', 'delivery_terms', $this->delivery_terms])
            ->andFilterWhere(['like', 'total_pcs', $this->total_pcs]);

        return $dataProvider;
    }
}
