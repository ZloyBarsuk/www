<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 01.06.2017
 * Time: 22:14
 */

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;
class MediaForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'safe'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'imageFile' => 'Печать предприятия',

        ];
    }



    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/signatures/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);

            return true;
        } else {
            return false;
        }
    }
}