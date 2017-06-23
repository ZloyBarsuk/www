<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banks".
 *
 * @property integer $bank_id
 * @property string $name_ua
 * @property string $name_en
 * @property string $adress_official_ua
 * @property string $adress_official_en
 * @property string $adress_post_ua
 * @property string $adress_post_en
 * @property string $created_at
 * @property integer $created_by
 *
 * @property BankDetails[] $bankDetails
 * @property BankToContractor[] $bankToContractors
 * @property UserAccounts $createdBy
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
            [['created_at,created_by'], 'safe'],
            [['name_ua', 'name_en', 'adress_official_ua', 'adress_official_en',], 'required'],
            [['created_by'], 'integer'],
            [['name_ua', 'name_en', 'adress_official_ua', 'adress_official_en', 'adress_post_ua', 'adress_post_en'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => UserAccounts::className(), 'targetAttribute' => ['created_by' => 'id']],
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
            'adress_official_ua' => Yii::t('app', 'Adress Official Ua'),
            'adress_official_en' => Yii::t('app', 'Adress Official En'),
            'adress_post_ua' => Yii::t('app', 'Adress Post Ua'),
            'adress_post_en' => Yii::t('app', 'Adress Post En'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBankDetails()
    {
        return $this->hasMany(BankDetails::className(), ['id_bank' => 'bank_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBankToContractors()
    {
        return $this->hasMany(BankToContractor::className(), ['id_bank' => 'bank_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(UserAccounts::className(), ['id' => 'created_by']);
    }
}
