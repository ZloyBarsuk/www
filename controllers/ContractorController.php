<?php

namespace app\controllers;

use app\models\ContractorInfo;
use Yii;
use app\models\Contractor;
use app\models\ContractorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\web\UploadedFile;
use app\models\MediaForm;

/**
 * ContractorController implements the CRUD actions for Contractor model.
 */
class ContractorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Contractor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContractorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Contractor model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Contractor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    /**
     * Updates an existing Contractor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->contractor_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Contractor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Contractor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contractor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contractor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionCreate_old()
    {
        $model_contr = new Contractor();
        $model_contr_info = new ContractorInfo();

        // Ajax
        $request = Yii::$app->getRequest();
        if ($request->isAjax && $model_contr->load($request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model_contr);
        }
        // General use
        if ($model_contr->load($request->post()) && $model_contr->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model_contr' => $model_contr,
                'model_contr_info' => $model_contr_info,

            ]);
        }
    }


    public function actionCreate()
    {
        $model_contr = new Contractor();
        $model_contr_info = new ContractorInfo();
        $model_media = new MediaForm();
        $request = Yii::$app->getRequest();

        // если AJAX
        if ($request->isAjax) {

            if ($model_contr->load($request->post())) {
                // $image = UploadedFile::getInstance($model_contr, 'image');

                /*if (!is_null($image)) {
                    $model_contr->signature = $image->name;
                    $ext=(explode(".", $image->name));
                    $ext = end($ext);
                    // generate a unique file name to prevent duplicate filenames
                    $model_contr->signature = Yii::$app->security->generateRandomString().".{$ext}";
                    // the path to save file, you can set an uploadPath
                    // in Yii::$app->params (as used in example below)
                    Yii::$app->params['uploadPath'] = Yii::getAlias('@web'). 'uploads/signatures/';
                    $path = Yii::$app->params['uploadPath'] . $model_contr->signature;
                    $image->saveAs($path);
                }*/


                $model_contr_info->load($request->post());
                $valid = $model_contr->validate();
                $valid = $model_contr_info->validate() && $valid;
                if ($valid) {
                    $transaction = \Yii::$app->db->beginTransaction();
                    try {
                        if ($flag = $model_contr->save(false)) {

                            $model_contr_info->id_contractor = $model_contr->contractor_id;
                            if (!($flag = $model_contr_info->save(false))) {
                                $transaction->rollBack();

                            }

                        }
                        if ($flag) {
                            $transaction->commit();

                            // success message flash
                            Yii::$app->session->setFlash('success', 'This is the message');
                        }
                    } catch (Exception $e) {
                        $transaction->rollBack();
                    }
                } else {



                }
            } else {
                return $this->renderAjax('create', [
                    'model_contr' => $model_contr,
                    'model_contr_info' => $model_contr_info,
                    'model_media' => $model_media,


                ]);
            }


        } else {
            return $this->render('create', [
                'model_contr' => $model_contr,
                'model_contr_info' => $model_contr_info,
                'model_media' => $model_media,
            ]);

        }


    }




    public function actionValidate()
    {
        $model = new Contractor();
        $request = \Yii::$app->getRequest();
        if ($request->isAjax && $model->load($request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\widgets\ActiveForm::validate($model);
        }
    }


}
