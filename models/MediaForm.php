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
    public $uniq_name;

    public function rules()
    {
        return [
            [['imageFile'], 'safe'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif'],
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

        $unique_filename=uniqid();

        if ($this->validate()) {
           // $this->imageFile->saveAs('uploads/signatures/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->imageFile->saveAs('uploads/signatures/' .  mb_convert_encoding($this->imageFile->baseName, 'Windows-1251', 'UTF-8'). '.' . $this->imageFile->extension);

            return true;
        } else {
            return false;
        }
    }
}