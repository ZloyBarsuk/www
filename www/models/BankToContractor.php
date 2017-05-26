<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bank_to_contractor".
 *
 * @property integer $bank_contr_id
 * @property integer $id_contractor
 * @property integer $id_bank
 * @property integer $created_at
 * @property integer $active
 *
 * @property Banks $idBank
 * @property Contractor $idContractor
 * @property Dogovor[] $dogovors
 * @property Dogovor[] $dogovors0
 */
class BankToContractor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank_to_contractor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_contractor', 'id_bank', 'created_at'], 'required'],
            [['id_contractor', 'id_bank', 'created_at', 'active'], 'integer'],
            [['id_bank'], 'exist', 'skipOnError' => true, 'targetClass' => Banks::className(), 'targetAttribute' => ['id_bank' => 'bank_id']],
            [['id_contractor'], 'exist', 'skipOnError' => true, 'targetClass' => Contractor::className(), 'targetAttribute' => ['id_contractor' => 'contractor_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bank_contr_id' => Yii::t('app', 'Bank Contr ID'),
            'id_contractor' => Yii::t('app', 'Id Contractor'),
            'id_bank' => Yii::t('app', 'Id Bank'),
            'created_at' => Yii::t('app', 'Created At'),
            'active' => Yii::t('app', 'Active'),
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
    public function getIdContractor()
    {
        return $this->hasOne(Contractor::className(), ['contractor_id' => 'id_contractor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDogovors()
    {
        return $this->hasMany(Dogovor::className(), ['id_bank_executor' => 'bank_contr_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDogovors0()
    {
        return $this->hasMany(Dogovor::className(), ['id_bank_contractor' => 'bank_contr_id']);
    }
}
