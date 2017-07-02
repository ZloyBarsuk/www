<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "banks".
 *
 * @property integer $bank_id
 * @property string $name_ua
 * @property string $name_en
 * @property string $inn
 * @property string $kpp
 * @property string $ogrm
 * @property string $adress_official_ua
 * @property string $adress_official_en
 * @property string $adress_post_ua
 * @property string $adress_post_en
 * @property string $r_s
 * @property string $k_s
 * @property string $bic
 * @property string $swift
 * @property string $account_type
 * @property string $created_at
 * @property integer $created_by
 * @property integer $contractor_id
 * @property string $by_default
 *
 * @property Contractor $contractor
 * @property User $createdBy
 */
class Banks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_type', 'by_default'], 'string'],
            [['created_at','created_by'], 'safe'],
            [['name_ua', 'name_en', 'contractor_id'], 'required'],
            [['name_ua', 'name_en', 'adress_official_ua', 'adress_official_en','r_s', 'k_s','account_type', 'by_default'], 'required'],
            [['created_by', 'contractor_id'], 'integer'],
            [['name_ua', 'name_en', 'adress_official_ua', 'adress_official_en', 'adress_post_ua', 'adress_post_en','comments'], 'string', 'max' => 255],
            [['inn'], 'string', 'max' => 12],
            [['kpp', 'bic', 'swift'], 'string', 'max' => 9],
            [['ogrm'], 'string', 'max' => 13],
            [['r_s', 'k_s'], 'string', 'max' => 20],
            [['contractor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contractor::className(), 'targetAttribute' => ['contractor_id' => 'contractor_id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bank_id' => Yii::t('app', 'Bank ID'),
            'name_ua' => Yii::t('app', 'Name Ua'),
            'name_en' => Yii::t('app', 'Name En'),
            'inn' => Yii::t('app', 'Inn'),
            'kpp' => Yii::t('app', 'Kpp'),
            'ogrm' => Yii::t('app', 'Ogrm'),
            'adress_official_ua' => Yii::t('app', 'Adress Official Ua'),
            'adress_official_en' => Yii::t('app', 'Adress Official En'),
            'adress_post_ua' => Yii::t('app', 'Adress Post Ua'),
            'adress_post_en' => Yii::t('app', 'Adress Post En'),
            'r_s' => Yii::t('app', 'R S'),
            'k_s' => Yii::t('app', 'K S'),
            'bic' => Yii::t('app', 'Bic'),
            'swift' => Yii::t('app', 'Swift'),
            'account_type' => Yii::t('app', 'Account Type'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'contractor_id' => Yii::t('app', 'Contractor ID'),
            'by_default' => Yii::t('app', 'By Default'),
            'comments' => Yii::t('app', 'Comments'),


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
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }


    public static function AllBanks()
    {
        $banks_model_list = ArrayHelper::map(self::find()->orderBy('name_ua')->asArray()->all(), 'bank_id', 'name_ua');
        return $banks_model_list;
    }


}
