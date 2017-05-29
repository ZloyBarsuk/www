<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inv_ext_lot_number".
 *
 * @property integer $id
 * @property integer $inv_id
 * @property integer $prod_t_inv_id
 * @property string $external_lot_number_en
 * @property string $external_lot_number_ua
 * @property string $alloc_quantity
 * @property string $location
 *
 * @property ProductsToInvoice $inv
 * @property ProductsToInvoice $prodTInv
 */
class LotNumber extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_ext_lot_number';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inv_id', 'prod_t_inv_id'], 'required'],
            [['inv_id', 'prod_t_inv_id'], 'integer'],
            [['external_lot_number_en', 'external_lot_number_ua'], 'string', 'max' => 500],
            [['alloc_quantity'], 'string', 'max' => 15],
            [['location'], 'string', 'max' => 50],
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
            'inv_id' => Yii::t('app', 'Inv ID'),
            'prod_t_inv_id' => Yii::t('app', 'Prod T Inv ID'),
            'external_lot_number_en' => Yii::t('app', 'External Lot Number En'),
            'external_lot_number_ua' => Yii::t('app', 'External Lot Number Ua'),
            'alloc_quantity' => Yii::t('app', 'Alloc Quantity'),
            'location' => Yii::t('app', 'Location'),
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
