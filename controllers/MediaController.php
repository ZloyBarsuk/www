<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 01.06.2017
 * Time: 22:17
 */

namespace app\controllers;


use Yii;
use yii\web\Controller;
use app\models\MediaForm;
use yii\web\UploadedFile;

class MediaController extends Controller
{
    public function actionUpload()
    {
        $model = new MediaForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                // return "{'imageFile':$model->imageFile}";
                //    return '{}';
                return json_encode([
                    'result' => 'ok',
                    'uplFile' => $model->imageFile,
                ]);

                // формат ответа для формы загрузки блядь
                /*                {"form":{},"files":[{}],"filenames":["fuck.png"],"filescount":1,"extra":{},"response":{},"reader":{},"jqXHR":{"readyState":4,"responseText":"{}","responseJSON":{},"status":200,"statusText":"OK"}}*/
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
}