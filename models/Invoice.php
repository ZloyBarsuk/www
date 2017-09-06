<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property integer $invoice_id
 * @property integer $contractor_id
 * @property integer $executor_id
 * @property string $number
 * @property string $order_number
 * @property string $purchase_order
 * @property string $warehouse_name
 * @property string $h_s_code
 * @property string $comment
 * @property string $net_weight
 * @property string $gross_weight
 * @property integer $doc_template_id
 * @property string $paletts_info
 * @property string $payment_item
 * @property string $shipment
 * @property string $delivery_terms
 * @property string $total_pcs
 * @property string $total_summ
 * @property string $freight
 * @property string $document_date
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $dogovor_id
 *
 * @property Contractor $contractor
 * @property Contractor $executor
 * @property DocumentTemplate $docTemplate
 * @property Dogovor $dogovor
 * @property UserAccounts $createdBy
 * @property UserAccounts $updatedBy
 * @property ProductsToInvoice[] $productsToInvoices
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contractor_id', 'executor_id', 'number', 'order_number', 'purchase_order','dogovor_id', 'warehouse_name', 'h_s_code', 'comment', 'net_weight', 'gross_weight', 'doc_template_id', 'paletts_info', 'payment_item', 'shipment', 'delivery_terms', 'total_pcs', 'document_date', 'created_by', 'updated_by'], 'required'],
            [['contractor_id', 'executor_id', 'doc_template_id', 'created_by', 'updated_by', 'dogovor_id'], 'integer'],
            [['total_summ', 'freight'], 'number'],
            [['document_date', 'created_at', 'updated_at'], 'safe'],
            [['number', 'order_number', 'purchase_order', 'h_s_code', 'comment', 'net_weight', 'gross_weight', 'paletts_info'], 'string', 'max' => 50],
            [['warehouse_name'], 'string', 'max' => 100],
            [['payment_item', 'shipment', 'delivery_terms', 'total_pcs'], 'string', 'max' => 255],
            [['contractor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contractor::className(), 'targetAttribute' => ['contractor_id' => 'contractor_id']],
            [['executor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contractor::className(), 'targetAttribute' => ['executor_id' => 'contractor_id']],
            [['doc_template_id'], 'exist', 'skipOnError' => true, 'targetClass' => DocumentTemplate::className(), 'targetAttribute' => ['doc_template_id' => 'doc_templ_id']],
            [['dogovor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dogovor::className(), 'targetAttribute' => ['dogovor_id' => 'dogovor_id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => UserAccounts::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => UserAccounts::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'invoice_id' => Yii::t('app', 'Invoice ID'),
            'contractor_id' => Yii::t('app', 'Contractor ID'),
            'executor_id' => Yii::t('app', 'Executor ID'),
            'number' => Yii::t('app', 'Number'),
            'order_number' => Yii::t('app', 'Order Number'),
            'purchase_order' => Yii::t('app', 'Purchase Order'),
            'warehouse_name' => Yii::t('app', 'Warehouse Name'),
            'h_s_code' => Yii::t('app', 'H S Code'),
            'comment' => Yii::t('app', 'Comment'),
            'net_weight' => Yii::t('app', 'Net Weight'),
            'gross_weight' => Yii::t('app', 'Gross Weight'),
            'doc_template_id' => Yii::t('app', 'Doc Template ID'),
            'paletts_info' => Yii::t('app', 'Paletts Info'),
            'payment_item' => Yii::t('app', 'Payment Item'),
            'shipment' => Yii::t('app', 'Shipment'),
            'delivery_terms' => Yii::t('app', 'Delivery Terms'),
            'total_pcs' => Yii::t('app', 'Total Pcs'),
            'total_summ' => Yii::t('app', 'Total Summ'),
            'freight' => Yii::t('app', 'Freight'),
            'document_date' => Yii::t('app', 'Document Date'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'dogovor_id' => Yii::t('app', 'Dogovor ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContractor()
    {
        return $this->hasOne(Contractor::className(), ['contractor_id' => 'contractor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExecutor()
    {
        return $this->hasOne(Contractor::className(), ['contractor_id' => 'executor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocTemplate()
    {
        return $this->hasOne(DocumentTemplate::className(), ['doc_templ_id' => 'doc_template_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDogovor()
    {
        return $this->hasOne(Dogovor::className(), ['dogovor_id' => 'dogovor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(UserAccounts::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(UserAccounts::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsToInvoices()
    {
        return $this->hasMany(ProductsToInvoice::className(), ['invoice_id' => 'invoice_id']);
    }
}
