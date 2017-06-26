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
            [['name_ua', 'name_en'], 'required'],
            //  [['created_by'], 'integer'],
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

    public static function AllBanks()
    {
        $banks_model_list = ArrayHelper::map(self::find()->orderBy('name_ua')->asArray()->all(), 'bank_id','name_ua');
        return $banks_model_list;
    }
}
