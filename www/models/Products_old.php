<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $products_id
 * @property string $description_en
 * @property string $description_ua
 * @property string $part_number
 * @property string $country_origin_en
 * @property string $country_origin_ua
 * @property string $tarif_number_en
 * @property string $tarif_number_ua
 * @property string $weight
 * @property string $height
 * @property string $width
 * @property string $length
 * @property string $price
 * @property integer $active
 * @property string $created_at
 *
 * @property ProductsToInvoice[] $productsToInvoices
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description_en', 'description_ua', 'part_number',], 'required'],
            [['price'], 'number'],
           //  [['active'], 'integer'],
            [['created_at,active'], 'safe'],
            [['description_en', 'description_ua', 'part_number', 'country_origin_en', 'country_origin_ua', 'tarif_number_en', 'tarif_number_ua'], 'string', 'max' => 255],
            [['weight', 'height', 'width', 'length'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'products_id' => Yii::t('app', 'Products ID'),
            'description_en' => Yii::t('app', 'Description En'),
            'description_ua' => Yii::t('app', 'Description Ua'),
            'part_number' => Yii::t('app', 'Part Number'),
            'country_origin_en' => Yii::t('app', 'Country Origin En'),
            'country_origin_ua' => Yii::t('app', 'Country Origin Ua'),
            'tarif_number_en' => Yii::t('app', 'Tarif Number En'),
            'tarif_number_ua' => Yii::t('app', 'Tarif Number Ua'),
            'weight' => Yii::t('app', 'Weight'),
            'height' => Yii::t('app', 'Height'),
            'width' => Yii::t('app', 'Width'),
            'length' => Yii::t('app', 'Length'),
            'price' => Yii::t('app', 'Price'),
            'active' => Yii::t('app', 'Active'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsToInvoices()
    {
        return $this->hasMany(ProductsToInvoice::className(), ['product_id' => 'products_id']);
    }
}
