<?php

namespace app\controllers;

use Yii;
use app\models\Banks;
use app\models\BanksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;

/**
 * BanksController implements the CRUD actions for Banks model.
 */
class BanksController extends Controller
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
     * Lists all Banks models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BanksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Banks model.
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
     * Creates a new Banks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model_bank = new Banks();
        //  $model_contr = new Contractor(['scenario' => "create"]);
        //  $model_contr_info = new ContractorInfo();
        //   $model_media = new MediaForm();
        $request = Yii::$app->getRequest();
        Yii::$app->response->format = Response::FORMAT_JSON;
        $contractor_id = !empty($request->post('contractor_id')) ? $request->post('contractor_id') : '';
        $model_bank->contractor_id = $contractor_id;
        // если AJAX
        if ($request->isAjax) {

            if ($model_bank->load($request->post())) {

                if ($model_bank->validate()) {

                    $transaction = Yii::$app->db->beginTransaction();
                    try {
                        if ($model_bank->save(false)) {

                            $transaction->commit();
                            return ['notify' => 1, 'notify_text' => Yii::t('app', 'The action was successful')];

                        } else {
                            $transaction->rollBack();
                            return ['notify' => 0, 'notify_text' => Yii::t('app', 'The action was unsuccessful')];

                        }
                    } catch (Exception $e) {
                        $transaction->rollBack();
                        return ['notify' => 0, 'notify_text' => Yii::t('app', 'The action was unsuccessful')];
                    }
                } else {
                    return ['notify' => 0, 'notify_text' => Yii::t('app', 'The action was unsuccessful'), 'validate' => $model_bank->errors];

                }
            } else {
                return $this->renderAjax('create_form', [
                    'model_bank' => $model_bank,
                    // 'contractor_flag'=>$contractor_id,

                ]);
            }


        } else {
            return $this->render('create_form', [
                'model_bank' => $model_bank,
                //  'contractor_flag'=>$contractor_id,

            ]);

        }
    }


    public function actionUpdate($id)
    {
        $model_bank = $this->findModel($id);
        $request = Yii::$app->getRequest();
        Yii::$app->response->format = Response::FORMAT_JSON;

        // если AJAX
        if ($request->isAjax) {
            if ($model_bank->load($request->post()) && $model_bank->validate()) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($model_bank->save(false)) {
                        $transaction->commit();
                        return ['notify' => 1, 'notify_text' => Yii::t('app', 'The action was successful'), 'validate' => '', /*'result' => $model->save()*/];
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                    return ['notify' => 0, 'notify_text' => Yii::t('app', 'The action was unsuccessful'), 'validate' => ''];
                }
            } else {
                return $this->renderAjax('create_form', [
                    'model_bank' => $model_bank,]);
            }
        } else {
            return $this->renderAjax('create_form', [
                'model_bank' => $model_bank,]);
        }


    }


    /**
     * Deletes an existing Banks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public
    function actionDelete($id)
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

    /**
     * Finds the Banks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Banks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel($id)
    {
        if (($model = Banks::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public
    function actionCreateFromList()
    {

        $data_list = Banks::AllBanks();
        $request = Yii::$app->getRequest();
        $banks_model = new Banks();
        if ($request->isAjax) {
            $post = $request->post();

            $banks_model = new Banks();
            if ($request->isAjax) {


                if (!empty($post)) {

                    $postModel = $post['Banks'];
                    $postModelMulti = $postModel['bank_id'];
                    if (!empty($postModelMulti)) {
                        foreach ($postModelMulti as $key => $value) {
                            $bank_model = $this->findModel($value);
                            if ($bank_model) {
                                $bank_model->id_contractor = $post['cont_id'];
                                $bank_model->save(false);
                            }
                        }

                    }

                }
                if ($banks_model->load($request->post())) {
                    $contractor_ids = $request->post();


                }
                return $this->renderAjax('select_bank_form', [
                    'data_list' => $data_list,
                    'banks_model' => $banks_model,


                ]);
            }

        }
    }

    public
    function actionAjaxValidate()
    {
        $model = new Banks();
        $model->load(Yii::$app->request->post());
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }
}
