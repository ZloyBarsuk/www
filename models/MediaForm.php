<?php
//add your name space
namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

use yii\base\Model;
use yii\web\UploadedFile;

class MediaForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $fuck=['fuck'=>'sdfsdfsddf'];
            return [$fuck]; // json_encode($fuck);
        } else {
            return false;
        }
    }


}