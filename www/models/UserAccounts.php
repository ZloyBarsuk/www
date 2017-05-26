<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_accounts".
 *
 * @property integer $id
 * @property string $login
 * @property string $password_hash
 * @property string $auth_key
 * @property integer $administrator
 * @property integer $creator
 * @property string $creator_ip
 * @property string $confirm_token
 * @property string $recovery_token
 * @property integer $blocked_at
 * @property integer $confirmed_at
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property BankDetails[] $bankDetails
 * @property Banks[] $banks
 * @property Contractor[] $contractors
 * @property ContractorInfo[] $contractorInfos
 * @property Dogovor[] $dogovors
 * @property Invoice[] $invoices
 * @property Invoice[] $invoices0
 */
class UserAccounts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_accounts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password_hash', 'auth_key', 'created_at', 'updated_at'], 'required'],
            [['administrator', 'creator', 'blocked_at', 'confirmed_at', 'created_at', 'updated_at'], 'integer'],
            [['login', 'password_hash', 'auth_key', 'confirm_token', 'recovery_token'], 'string', 'max' => 255],
            [['creator_ip'], 'string', 'max' => 40],
            [['login'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'login' => Yii::t('app', 'Login'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'administrator' => Yii::t('app', 'Administrator'),
            'creator' => Yii::t('app', 'Creator'),
            'creator_ip' => Yii::t('app', 'Creator Ip'),
            'confirm_token' => Yii::t('app', 'Confirm Token'),
            'recovery_token' => Yii::t('app', 'Recovery Token'),
            'blocked_at' => Yii::t('app', 'Blocked At'),
            'confirmed_at' => Yii::t('app', 'Confirmed At'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBankDetails()
    {
        return $this->hasMany(BankDetails::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBanks()
    {
        return $this->hasMany(Banks::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContractors()
    {
        return $this->hasMany(Contractor::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContractorInfos()
    {
        return $this->hasMany(ContractorInfo::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDogovors()
    {
        return $this->hasMany(Dogovor::className(), ['id_author' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoice::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices0()
    {
        return $this->hasMany(Invoice::className(), ['updated_by' => 'id']);
    }
}
