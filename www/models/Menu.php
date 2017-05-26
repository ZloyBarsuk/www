<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property integer $id_parent
 * @property string $icon_class
 * @property string $name
 * @property string $url
 * @property string $image_path
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_parent'], 'integer'],
            [['name', 'url'], 'required'],
            [['icon_class', 'name'], 'string', 'max' => 50],
            [['url'], 'string', 'max' => 100],
            [['image_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_parent' => Yii::t('app', 'Id Parent'),
            'icon_class' => Yii::t('app', 'Icon Class'),
            'name' => Yii::t('app', 'Name'),
            'url' => Yii::t('app', 'Url'),
            'image_path' => Yii::t('app', 'Image Path'),
        ];
    }
}
