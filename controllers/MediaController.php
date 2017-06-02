<?php
/**
 * Created by PhpStorm.
 * User: ZloyBarsuk
 * Date: 01.06.2017
 * Time: 15:31
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
                return;
            }
        }

        return $this->render('upload_form', ['model' => $model]);
    }
}