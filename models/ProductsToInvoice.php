<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products_to_invoice".
 *
 * @property integer $pr_to_inv_id
 * @property integer $invoice_id
 * @property string $item_number
 * @property string $remark
 * @property integer $product_id
 * @property string $quantity
 * @property string $unit
 * @property string $unit_price_manual
 * @property string $total_price
 * @property string $created_at
 * @property string $updated_at
 *
 * @property InvExtLotNumber[] $invExtLotNumbers
 * @property InvExtLotNumber[] $invExtLotNumbers0
 * @property InvSalesOrdConf[] $invSalesOrdConfs
 * @property InvSalesOrdConf[] $invSalesOrdConfs0
 * @property Invoice $invoice
 * @property Products $product
 */
class ProductsToInvoice extends \yii\db\ActiveRecord
{
    public $part_number='';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_to_invoice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_id', 'product_id', 'unit'], 'required'],
            [['invoice_id', 'product_id'], 'integer'],
            [['quantity', 'unit_price_manual', 'total_price'], 'number'],
            [['unit'], 'string'],
            [['part_number'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['item_number'], 'string', 'max' => 10],
            [['remark'], 'string', 'max' => 255],
            [['invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::className(), 'targetAttribute' => ['invoice_id' => 'invoice_id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'products_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pr_to_inv_id' => Yii::t('app', 'Pr To Inv ID'),
            'invoice_id' => Yii::t('app', 'Invoice ID'),
            'item_number' => Yii::t('app', 'Item Number'),
            'remark' => Yii::t('app', 'Remark'),
            'product_id' => Yii::t('app', 'Product ID'),
            'quantity' => Yii::t('app', 'Quantity'),
            'unit' => Yii::t('app', 'Unit'),
            'unit_price_manual' => Yii::t('app', 'Unit Price Manual'),
            'total_price' => Yii::t('app', 'Total Price'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvExtLotNumbers()
    {
        return $this->hasMany(InvExtLotNumber::className(), ['inv_id' => 'invoice_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvExtLotNumbers0()
    {
        return $this->hasMany(InvExtLotNumber::className(), ['prod_t_inv_id' => 'pr_to_inv_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvSalesOrdConfs()
    {
        return $this->hasMany(InvSalesOrdConf::className(), ['inv_id' => 'invoice_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvSalesOrdConfs0()
    {
        return $this->hasMany(InvSalesOrdConf::className(), ['prod_t_inv_id' => 'pr_to_inv_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['invoice_id' => 'invoice_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['products_id' => 'product_id']);
    }
}
