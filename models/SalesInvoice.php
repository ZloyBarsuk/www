<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inv_sales_ord_conf".
 *
 * @property integer $id
 * @property string $sales_order_confirmation
 * @property string $sales_of
 * @property integer $inv_id
 * @property integer $prod_t_inv_id
 * @property string $delivery_note
 * @property string $delivery_of
 * @property string $departure_warehouse
 *
 * @property ProductsToInvoice $inv
 * @property ProductsToInvoice $prodTInv
 */
class SalesInvoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_sales_ord_conf';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inv_id', 'prod_t_inv_id'], 'required'],
            [['inv_id', 'prod_t_inv_id'], 'integer'],
            [['sales_order_confirmation'], 'string', 'max' => 255],
            [['sales_of', 'delivery_note', 'delivery_of'], 'string', 'max' => 50],
            [['departure_warehouse'], 'string', 'max' => 500],
            [['inv_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsToInvoice::className(), 'targetAttribute' => ['inv_id' => 'invoice_id']],
            [['prod_t_inv_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsToInvoice::className(), 'targetAttribute' => ['prod_t_inv_id' => 'pr_to_inv_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sales_order_confirmation' => Yii::t('app', 'Sales Order Confirmation'),
            'sales_of' => Yii::t('app', 'Sales Of'),
            'inv_id' => Yii::t('app', 'Inv ID'),
            'prod_t_inv_id' => Yii::t('app', 'Prod T Inv ID'),
            'delivery_note' => Yii::t('app', 'Delivery Note'),
            'delivery_of' => Yii::t('app', 'Delivery Of'),
            'departure_warehouse' => Yii::t('app', 'Departure Warehouse'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInv()
    {
        return $this->hasOne(ProductsToInvoice::className(), ['invoice_id' => 'inv_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdTInv()
    {
        return $this->hasOne(ProductsToInvoice::className(), ['pr_to_inv_id' => 'prod_t_inv_id']);
    }
}
