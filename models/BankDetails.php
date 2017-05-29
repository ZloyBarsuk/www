<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bank_details".
 *
 * @property integer $bank_det_id
 * @property integer $id_bank
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
 * @property integer $created_by
 * @property string $created_at
 *
 * @property Banks $idBank
 * @property UserAccounts $createdBy
 */
class BankDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bank', 'created_by'], 'required'],
            [['id_bank', 'created_by'], 'integer'],
            [['account_type'], 'string'],
            [['created_at'], 'safe'],
            [['inn'], 'string', 'max' => 12],
            [['kpp', 'bic', 'swift'], 'string', 'max' => 9],
            [['ogrm'], 'string', 'max' => 13],
            [['adress_official_ua', 'adress_official_en', 'adress_post_ua', 'adress_post_en'], 'string', 'max' => 255],
            [['r_s', 'k_s'], 'string', 'max' => 20],
            [['id_bank'], 'exist', 'skipOnError' => true, 'targetClass' => Banks::className(), 'targetAttribute' => ['id_bank' => 'bank_id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => UserAccounts::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bank_det_id' => Yii::t('app', 'Bank Det ID'),
            'id_bank' => Yii::t('app', 'Id Bank'),
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
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBank()
    {
        return $this->hasOne(Banks::className(), ['bank_id' => 'id_bank']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(UserAccounts::className(), ['id' => 'created_by']);
    }
}
