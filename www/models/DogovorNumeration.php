<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dogovor_numeration".
 *
 * @property integer $dog_num_id
 * @property integer $number
 * @property integer $executor_id
 * @property string $date
 *
 * @property Contractor $executor
 */
class DogovorNumeration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dogovor_numeration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number', 'executor_id'], 'integer'],
            [['date'], 'safe'],
            [['executor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contractor::className(), 'targetAttribute' => ['executor_id' => 'contractor_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dog_num_id' => Yii::t('app', 'Dog Num ID'),
            'number' => Yii::t('app', 'Number'),
            'executor_id' => Yii::t('app', 'Executor ID'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExecutor()
    {
        return $this->hasOne(Contractor::className(), ['contractor_id' => 'executor_id']);
    }
}
