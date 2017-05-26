<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contractor".
 *
 * @property integer $contractor_id
 * @property string $name_ua
 * @property string $name_en
 * @property string $signature
 * @property string $filename
 * @property string $created_at
 * @property integer $created_by
 * @property string $contractor_type
 *
 * @property BankToContractor[] $bankToContractors
 * @property UserAccounts $createdBy
 * @property ContractorInfo[] $contractorInfos
 * @property DocumentTemplate[] $documentTemplates
 * @property Dogovor[] $dogovors
 * @property Dogovor[] $dogovors0
 * @property DogovorNumeration[] $dogovorNumerations
 * @property Invoice[] $invoices
 * @property Invoice[] $invoices0
 */
class Contractor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contractor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['name_ua'], 'unique'],
            [['name_en'], 'unique'],
            [['created_by'], 'required'],
            [['created_by'], 'integer'],
            [['contractor_type'], 'string'],
            [['name_ua', 'name_en', 'signature', 'filename'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'contractor_id' => Yii::t('app', 'Contractor ID'),
            'name_ua' => Yii::t('app', 'Name Ua'),
            'name_en' => Yii::t('app', 'Name En'),
            'signature' => Yii::t('app', 'Signature'),
            'filename' => Yii::t('app', 'Filename'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'contractor_type' => Yii::t('app', 'Contractor Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBankToContractors()
    {
        return $this->hasMany(BankToContractor::className(), ['id_contractor' => 'contractor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(UserAccounts::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContractorInfos()
    {
        return $this->hasMany(ContractorInfo::className(), ['id_contractor' => 'contractor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentTemplates()
    {
        return $this->hasMany(DocumentTemplate::className(), ['contractor_id' => 'contractor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDogovors()
    {
        return $this->hasMany(Dogovor::className(), ['id_executor' => 'contractor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDogovors0()
    {
        return $this->hasMany(Dogovor::className(), ['id_contractor' => 'contractor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDogovorNumerations()
    {
        return $this->hasMany(DogovorNumeration::className(), ['executor_id' => 'contractor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoice::className(), ['contractor_id' => 'contractor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices0()
    {
        return $this->hasMany(Invoice::className(), ['executor_id' => 'contractor_id']);
    }
}
