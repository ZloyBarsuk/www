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

    /* public function scenarios()
     {

         $scenarios = parent::scenarios();
         $scenarios['create'] = ['name_ua', 'name_en'];
         $scenarios['update'] =  ['name_ua', 'name_en','contractor_type'];
         return $scenarios;


     }*/

    public function scenarios()
    {
        return [
            'create' => ['name_ua', 'name_en', 'contractor_type', 'signature'],
            'update' => ['name_ua', 'name_en', 'contractor_type', 'signature']
        ];
    }


    public function rules()
    {
        return [
            [['name_ua', 'name_en'], 'required', 'on' => ['create', 'update']],
            [['name_ua', 'name_en'], 'unique', 'on' => ['create']],
            // [['name_ua', 'name_en', 'signature', 'contractor_type'], 'safe', 'on' => ['update']],
            [['name_ua', 'name_en', 'signature',], 'string', 'max' => 255, 'on' => ['create', 'update']],
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
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'contractor_type' => Yii::t('app', 'Contractor Type'),
        ];
    }



    public function getBanks()
    {
        return $this->hasMany(Banks::className(), ['contractor_id' => 'contractor_id']);
    }

    public function getAllBanksByContractor()
    {
        $result = $this->hasMany(Banks::className(), ['contractor_id' => 'contractor_id'])
            ->where('contractor_id = :contr_id', [':contr_id' => $this->contractor_id])
            ->orderBy('bank_id');
        return $result;
    }


    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }


    public function getContractorInfo()
    {
        return $this->hasOne(ContractorInfo::className(), ['id_contractor' => 'contractor_id']);
    }


    public function getDocumentTemplates()
    {
        return $this->hasMany(DocumentTemplate::className(), ['contractor_id' => 'contractor_id']);
    }


    public function getDogovorsExecutor()
    {
        return $this->hasMany(Dogovor::className(), ['id_executor' => 'contractor_id']);
    }


    public function getDogovorsContractor()
    {
        return $this->hasMany(Dogovor::className(), ['id_contractor' => 'contractor_id']);
    }


    public function getDogovorNumerations()
    {
        return $this->hasMany(DogovorNumeration::className(), ['executor_id' => 'contractor_id']);
    }


    public function getInvoicesContractor()
    {
        return $this->hasMany(Invoice::className(), ['contractor_id' => 'contractor_id']);
    }


    public function getInvoicesExecutor()
    {
        return $this->hasMany(Invoice::className(), ['executor_id' => 'contractor_id']);
    }
}
