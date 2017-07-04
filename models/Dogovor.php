<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dogovor".
 *
 * @property integer $dogovor_id
 * @property integer $id_executor
 * @property integer $doc_template_id
 * @property integer $id_contractor
 * @property integer $id_bank_contractor
 * @property integer $id_bank_executor
 * @property integer $id_author
 * @property string $dogovor_number
 * @property string $delivery_date
 * @property string $comments
 * @property string $total_summ
 * @property string $created_date
 * @property string $closed_date
 * @property string $updated_date
 * @property string $status
 * @property string $folder_path
 *
 * @property Contractor $idExecutor
 * @property Contractor $idContractor
 * @property DocumentTemplate $docTemplate
 * @property User $idAuthor
 * @property Invoice[] $invoices
 */
class Dogovor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dogovor';
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
            [['id_executor', 'doc_template_id', 'id_contractor', 'id_bank_executor', 'id_bank_contractor', 'dogovor_number'], 'required'],
            [['id_executor', 'doc_template_id', 'id_contractor', 'id_bank_contractor', 'id_bank_executor', 'id_author'], 'integer'],
            [['delivery_date', 'created_date', 'closed_date', 'updated_date'], 'safe'],
            [['comments', 'status', 'folder_path'], 'string'],
            [['total_summ'], 'double'],
            [['dogovor_number'], 'string', 'max' => 255],
            [['id_bank_contractor'], 'exist', 'skipOnError' => true, 'targetClass' => Banks::className(), 'targetAttribute' => ['id_bank_contractor' => 'bank_id']],
            [['id_executor'], 'exist', 'skipOnError' => true, 'targetClass' => Contractor::className(), 'targetAttribute' => ['id_executor' => 'contractor_id']],
            [['id_contractor'], 'exist', 'skipOnError' => true, 'targetClass' => Contractor::className(), 'targetAttribute' => ['id_contractor' => 'contractor_id']],
            [['doc_template_id'], 'exist', 'skipOnError' => true, 'targetClass' => DocumentTemplate::className(), 'targetAttribute' => ['doc_template_id' => 'doc_templ_id']],
            [['id_author'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_author' => 'id']],
            [['id_bank_executor'], 'exist', 'skipOnError' => true, 'targetClass' => Banks::className(), 'targetAttribute' => ['id_bank_executor' => 'bank_id']],
            [['doc_template_id', 'id_bank_executor', 'id_bank_contractor',], 'safe', 'on' => ['update']],

        ];
    }


    public function attributeLabels()
    {
        return [
            'dogovor_id' => Yii::t('app', 'Dogovor ID'),
            'id_executor' => Yii::t('app', 'Id Executor'),
            'doc_template_id' => Yii::t('app', 'Doc Template ID'),
            'id_contractor' => Yii::t('app', 'Id Contractor'),
            'id_bank_contractor' => Yii::t('app', 'Id Bank Contractor'),
            'id_bank_executor' => Yii::t('app', 'Id Bank Executor'),
            'id_author' => Yii::t('app', 'Id Author'),
            'dogovor_number' => Yii::t('app', 'Dogovor Number'),
            'delivery_date' => Yii::t('app', 'Delivery Date'),
            'comments' => Yii::t('app', 'Comments'),
            'total_summ' => Yii::t('app', 'Total Summ'),
            'created_date' => Yii::t('app', 'Created Date'),
            'closed_date' => Yii::t('app', 'Closed Date'),
            'updated_date' => Yii::t('app', 'Updated Date'),
            'status' => Yii::t('app', 'Status'),
            'folder_path' => Yii::t('app', 'Folder Path'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdExecutor()
    {
        return $this->hasOne(Contractor::className(), ['contractor_id' => 'id_executor']);
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
    public function getDocTemplate()
    {
        return $this->hasOne(DocumentTemplate::className(), ['doc_templ_id' => 'doc_template_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'id_author']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoice::className(), ['dogovor_id' => 'dogovor_id']);
    }
}
