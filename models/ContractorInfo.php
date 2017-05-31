<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contractor_info".
 *
 * @property integer $contr_info_id
 * @property integer $id_contractor
 * @property string $adress_official_ua
 * @property string $adress_official_en
 * @property string $adress_post_ua
 * @property string $adress_post_en
 * @property string $director_ua
 * @property string $director_en
 * @property string $email
 * @property string $phone
 * @property string $fax
 * @property string $contact_person
 * @property string $tax_number
 * @property string $vat_reg_no
 * @property string $rep
 * @property string $customer_number
 * @property integer $created_at
 * @property integer $created_by
 *
 * @property Contractor $idContractor
 * @property UserAccounts $createdBy
 */
class ContractorInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contractor_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_contractor', 'adress_official_ua', 'adress_official_en', 'adress_post_ua', 'adress_post_en', 'created_at', 'created_by'], 'required'],
            [['id_contractor', 'created_at', 'created_by'], 'integer'],
            [['adress_official_ua', 'adress_official_en', 'adress_post_ua', 'adress_post_en', 'director_ua', 'director_en', 'email', 'phone', 'fax', 'contact_person', 'tax_number', 'vat_reg_no', 'rep', 'customer_number'], 'string', 'max' => 255],
            [['id_contractor'], 'exist', 'skipOnError' => true, 'targetClass' => Contractor::className(), 'targetAttribute' => ['id_contractor' => 'contractor_id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'contr_info_id' => Yii::t('app', 'Contr Info ID'),
            'id_contractor' => Yii::t('app', 'Id Contractor'),
            'adress_official_ua' => Yii::t('app', 'Adress Official Ua'),
            'adress_official_en' => Yii::t('app', 'Adress Official En'),
            'adress_post_ua' => Yii::t('app', 'Adress Post Ua'),
            'adress_post_en' => Yii::t('app', 'Adress Post En'),
            'director_ua' => Yii::t('app', 'Director Ua'),
            'director_en' => Yii::t('app', 'Director En'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'fax' => Yii::t('app', 'Fax'),
            'contact_person' => Yii::t('app', 'Contact Person'),
            'tax_number' => Yii::t('app', 'Tax Number'),
            'vat_reg_no' => Yii::t('app', 'Vat Reg No'),
            'rep' => Yii::t('app', 'Rep'),
            'customer_number' => Yii::t('app', 'Customer Number'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdContractor()
    {
        return $this->hasOne(Contractor::className(), ['contractor_id' => 'id_contractor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(UserAccounts::className(), ['id' => 'created_by']);
    }
}
