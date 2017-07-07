<?php

namespace app\controllers;

use app\models\Banks;
use app\models\BanksSearchByContractor;
use app\models\ContractorInfo;
use app\models\Model;
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


    public function actionIndex()
    {
        $searchModel = new ContractorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 10;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionUpdate($id)
    {
        $model_contr = $this->findModel($id);
        $model_contr->scenario = 'update';
        $model_contr_info = $model_contr->contractorInfo;
        if ($model_contr_info == null) {
            $model_contr_info = new ContractorInfo();

            $model_contr_info->id_contractor = $model_contr->contractor_id;
        }


        //  $model_contr_info->scenario = ContractorInfo::SCENARIO_UPDATE;

        $model_media = new MediaForm();
        $oldSignature = $model_contr->signature;

        $request = Yii::$app->getRequest();

        // если AJAX
        if ($request->isAjax) {

            if ($model_contr->load($request->post())) {

                $model_contr_info->load($request->post(), 'ContractorInfo');

                $valid = $model_contr->validate();
                $valid = $model_contr_info->validate() && $valid;

                // удаляем старую отку. если ее обновили;
                if ($oldSignature !== $model_contr->signature) {
                    unlink('uploads/signatures/' . $oldSignature);
                } else {
                    $model_contr->signature = $oldSignature;
                }

                if ($valid) {
                    $transaction = \Yii::$app->db->beginTransaction();
                    try {
                        if ($flag = $model_contr->save(false)) {

                            if (!($flag = $model_contr_info->save(false))) {
                                $transaction->rollBack();

                            }

                        }
                        if ($flag) {
                            $transaction->commit();

                            // success message flash

                            Yii::$app->response->format = Response::FORMAT_JSON;
                            return ['notify' => 1, 'notify_text' => Yii::t('app', 'The action was successful'), 'validate' => '', /*'result' => $model->save()*/];

                            // Yii::$app->session->setFlash('success', 'This is the message');
                        }
                    } catch (Exception $e) {
                        $transaction->rollBack();
                        Yii::$app->response->format = Response::FORMAT_JSON;
                        return ['notify' => 0, 'notify_text' => Yii::t('app', 'The action was unsuccessful'), 'validate' => ''];

                    }
                } else {


                }
            } else {
                return $this->renderAjax('update_form', [
                    'model_contr' => $model_contr,
                    'model_contr_info' => $model_contr_info,
                    'model_media' => $model_media,


                ]);
            }


        } else {
            return $this->render('update_form', [
                'model_contr' => $model_contr,
                'model_contr_info' => $model_contr_info,
                'model_media' => $model_media,
            ]);

        }
    }


    public function actionDelete($id)
    {
        $request = Yii::$app->getRequest();
        Yii::$app->response->format = Response::FORMAT_JSON;

        if ($request->isAjax && $request->isPost) {

            if ($this->findModel($id)->delete()) {
                return ['notify' => 1, 'flag' => 'success', 'notify_text' => Yii::t('app', 'Delete successful'),];

            } else {
                return ['notify' => 0, 'flag' => 'error', 'notify_text' => Yii::t('app', 'Delete unsuccessful'),];
            }

        }
    }


    public function actionBanksList()
    {
        $request = Yii::$app->getRequest();
        Yii::$app->response->format = Response::FORMAT_JSON;
        $contractor_id = !empty($request->post('contractor_id')) ? $request->post('contractor_id') : '';
        $searchModel = new BanksSearchByContractor($contractor_id);
        $dataProvider = $searchModel->SearchBanks(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 10;
        return $this->renderPartial('banks/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);


    }


    protected function findModel($id)
    {
        if (($model = Contractor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreate()
    {
        $model_contr = new Contractor(['scenario' => "create"]);
        $model_contr_info = new ContractorInfo();
        $model_media = new MediaForm();
        $request = Yii::$app->getRequest();

        // если AJAX
        if ($request->isAjax) {

            if ($model_contr->load($request->post())) {


                $model_contr_info->load($request->post());
                $valid = $model_contr->validate();
                $valid = $model_contr_info->validate() && $valid;
                if ($valid) {
                    // добавляем картинку
                    empty($model_contr->signature) ? $model_contr->signature = 'empty.png' : '';
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
                            Yii::$app->response->format = Response::FORMAT_JSON;
                            // success message flash
                            return ['notify' => 1, 'notify_text' => Yii::t('app', 'The action was successful'), 'validate' => '', 'contractor_id' => $model_contr->contractor_id];

                            // Yii::$app->session->setFlash('success', 'This is the message');
                        }
                    } catch (Exception $e) {
                        $transaction->rollBack();
                        Yii::$app->response->format = Response::FORMAT_JSON;
                        return ['notify' => 0, 'notify_text' => Yii::t('app', 'The action was unsuccessful'), 'validate' => ''];

                    }
                } else {


                }
            } else {
                return $this->renderAjax('create_form', [
                    'model_contr' => $model_contr,
                    'model_contr_info' => $model_contr_info,
                    'model_media' => $model_media,


                ]);
            }


        } else {
            return $this->render('create_form', [
                'model_contr' => $model_contr,
                'model_contr_info' => $model_contr_info,
                'model_media' => $model_media,
            ]);

        }


    }


    /* public function actionAjaxValidate($scenario = false,$model_id=false)
     {


         $model=  new Contractor(['scenario'=>$scenario]);



          //   $model=$this->findModel($model_id);
          //   $model->scenario=$scenario;

         $model->load(Yii::$app->request->post());
         Yii::$app->response->format = Response::FORMAT_JSON;
         return ActiveForm::validate($model);
     }*/


    public function actionAjaxValidate($scenario = false, $model_id = false)
    {
        if ($scenario == 'create') {
            $model = new Contractor(['scenario' => $scenario]);
        } else {
            $model = $this->findModel($model_id);
            $model->scenario = $scenario;
        }
        $model->load(Yii::$app->request->post());
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }

    /*public function actionAjaxvalidate($scenario = false)
    {
        $model = $scenario ? $this->findModel($id) : new Contractor(['scenario' => 'create']);
        $model->load(Yii::$app->request->post());
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }*/
}
