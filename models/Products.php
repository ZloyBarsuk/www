<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

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
 * @property string $active
 * @property string $created_at
 *
 * @property ProductsToInvoice[] $productsToInvoices
 */
class Products extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'products';
    }

    public function scenarios()
    {
        $attr = $this->attributes();
        return [
            'create' => $attr,
            'update' => $attr,
        ];
    }


    public function rules()
    {
        return [
            [['description_en', 'description_ua', 'part_number'], 'required', 'on' => ['create', 'update']],
            [['price'], 'number'],
            [['active'], 'string'],
            [['created_at'], 'safe'],
            [['description_en', 'description_ua'], 'unique', 'on' => ['create']],
            [['price'], 'required', 'on' => ['update']],
            [['description_en', 'description_ua', 'part_number', 'country_origin_en', 'country_origin_ua', 'tarif_number_en', 'tarif_number_ua'], 'safe', 'on' => ['update']],
            [['description_en', 'description_ua', 'part_number', 'country_origin_en', 'country_origin_ua', 'tarif_number_en', 'tarif_number_ua'], 'string', 'max' => 255],
            [['weight', 'height', 'width', 'length'], 'string', 'max' => 50],
        ];
    }


    public function attributeLabels()
    {
        return [
            'products_id' => Yii::t('app', 'Products ID'),
            'description_en' => Yii::t('app', 'Название En'),
            'description_ua' => Yii::t('app', 'Название Ua'),
            'part_number' => Yii::t('app', 'Артикул'),
            'country_origin_en' => Yii::t('app', 'Страна происх. En'),
            'country_origin_ua' => Yii::t('app', 'Страна происх. Ua'),
            'tarif_number_en' => Yii::t('app', 'Tarif Number En'),
            'tarif_number_ua' => Yii::t('app', 'Tarif Number Ua'),
            'weight' => Yii::t('app', 'Вес'),
            'height' => Yii::t('app', 'Высота'),
            'width' => Yii::t('app', 'Ширина'),
            'length' => Yii::t('app', 'Длина'),
            'price' => Yii::t('app', 'Цена'),
            'active' => Yii::t('app', 'Актуальность'),
            'created_at' => Yii::t('app', 'Создан'),
        ];
    }

    /*public static function AutocompleteProductsDropdown($product_id)
    {
        $products_model_list = self::find()->orderBy('description_en')->where(['products_id' => (int)$product_id])->asArray()->all();
        return $products_model_list;
    }*/




    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsToInvoices()
    {
        return $this->hasMany(ProductsToInvoice::className(), ['product_id' => 'products_id']);
    }





}
