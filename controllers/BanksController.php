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
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

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

    public function actionBanksList()
    {



        $model_bank = new Banks();
        $searchModel = new BanksSearch();
     //   $merged_params = Yii::$app->request->queryParams;
      //  var_dump($merged_params);
      //  exit;
        $request = Yii::$app->getRequest();
     //   Yii::$app->response->format = Response::FORMAT_JSON;
         if ($request->isPost) {
             $merged_params = Yii::$app->request->post();
         } else {
             $merged_params = Yii::$app->request->queryParams;
         }

         $dataProvider = $searchModel->search(\yii\helpers\ArrayHelper::merge(
             $merged_params,
             [$searchModel->formName() => ['contractor_id' =>$merged_params['contractor_id'] ]]
         ));

        return $this->renderAjax('contractor_banks',
            [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model_bank' => $model_bank,
                'contractor_id' => $merged_params['contractor_id'] ,
            ]);


    }

    public function actionDropdownByContractor()
    {
        //  Yii::$app->response->format = Response::FORMAT_JSON;

        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $contractor_id = $parents[0];
                $out = Banks::AllBanksContractorDropdown($contractor_id);
                $out = ArrayHelper::map($out, 'bank_id', 'name_ua');
                $result = [];
                $tmp_arr = [];
                foreach ($out as $key => $value) {
                    $tmp_arr = ['id' => $key, 'name' => $value];
                    $result[] = $tmp_arr;
                }

                echo Json::encode(['output' => $result, 'selected' => '']);
                return;
                //  return ['output' => $result, 'selected' => ''];


            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
        return;
        // return ['output' => '', 'selected' => ''];
    }


    public function actionIndex()
    {
        $searchModel = new BanksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

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
        $model_bank->contractor_id = $request->queryParams;
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
            return $this->renderAjax('create_form', [
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


        if ($request->isAjax) {
            if ($model_bank->load($request->post()) && $model_bank->validate()) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($model_bank->save()) {
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


    protected
    function findModel($id)
    {
        if (($model = Banks::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionCreateFromList()
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

    public function actionBanksListForContractor()
    {

        $searchModel = new BanksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    public function actionAjaxValidate()
    {
        $model = new Banks();
        $model->load(Yii::$app->request->post());
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }
}
