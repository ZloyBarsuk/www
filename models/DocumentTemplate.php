<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "document_template".
 *
 * @property integer $doc_templ_id
 * @property string $name
 * @property string $path_to_template
 * @property integer $contractor_id
 * @property string $document_type
 * @property string $date
 *
 * @property Contractor $contractor
 * @property Dogovor[] $dogovors
 * @property Invoice[] $invoices
 */
class DocumentTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'document_template';
    }

    public function scenarios()
    {
        $attr = $this->attributes();
        return [
            'create' => $attr,
            'update' => $attr,
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contractor_id'], 'integer'],
            [['contractor_id'], 'required'],
            [['name'], 'unique', 'on' => ['create']],
            [['name'], 'required', 'on' => ['create']],
            [['document_type'], 'string'],
            [['date', 'path_to_template'], 'safe'],
            [['name', 'path_to_template'], 'string', 'max' => 255],
            [['contractor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contractor::className(), 'targetAttribute' => ['contractor_id' => 'contractor_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'doc_templ_id' => Yii::t('app', 'Doc Templ ID'),
            'name' => Yii::t('app', 'Name'),
            'path_to_template' => Yii::t('app', 'Path To Template'),
            'contractor_id' => Yii::t('app', 'Contractor ID'),
            'document_type' => Yii::t('app', 'Document Type'),
            'date' => Yii::t('app', 'Date'),
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
    public function getDogovors()
    {
        return $this->hasMany(Dogovor::className(), ['doc_template_id' => 'doc_templ_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoice::className(), ['doc_template_id' => 'doc_templ_id']);
    }


    public static function AllTemplatesContractorDropdown($contr_id, $template_type = 'dogovor')
    {
        $templates_model_list = self::find()->orderBy('name')->where(['contractor_id' => (int)$contr_id, 'document_type' => $template_type])->asArray()->all();
        return $templates_model_list;
    }


}
