<?php

namespace app\controllers;

use app\models\BankDetails;
use app\models\Banks;
use app\models\ContractorInfo;
use Yii;
use app\models\Contractor;
use app\models\ContractorSearch;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

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


    public function actionTabs()
    {
        $model_Contractor = new Contractor();
        // $model2=Yii::$app->request->post('fuck');
        // $model2=$id;
        $html = $this->renderAjax('_form', ['model_Contractor' => $model_Contractor, 'model2' => 'fgh']);
        return Json::encode($html);
    }


    /**
     * Creates a new Contractor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $request = Yii::$app->request;
        $model_Contractor = new Contractor();
        $model_Contr_Info = new ContractorInfo();
        $model_Banks = new Banks();
        $model_Banks_Details = new BankDetails();


        // $model->loadDefaultValues();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */


            Yii::$app->response->format = Response::FORMAT_JSON;


            if ($request->isGet) {

                $form_html = $this->renderAjax(
                    'create',
                    [   'model_Contractor' => $model_Contractor,
                        'model_Contr_Info' => $model_Contr_Info,
                        'model_Banks' => $model_Banks,
                        'model_Banks_Details' => $model_Banks_Details,
                    ]
                );
                return Json::encode($form_html);



            } elseif ($model_Contractor->load($request->post()) && $model_Contractor->save()) {
                return [

                    'content' => '<span class="text-success">' . Yii::t('app', 'New record is written to DB') . 'x</span>',

                ];
            } else {
                $form_html = $this->renderAjax(
                    '_form',
                    [   'model_Contractor' => $model_Contractor,
                        'model_Contr_Info' => $model_Contr_Info,
                        'model_Banks' => $model_Banks,
                        'model_Banks_Details' => $model_Banks_Details,
                    ]
                );
                return Json::encode($form_html);
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model_Contractor->load($request->post()) && $model_Contractor->save()) {
              //  return $this->redirect(['view', 'id' => $model_Contractor->products_id]);
            } else {
                return $this->render('create', [
                    'model_Contractor' => $model_Contractor,
                ]);
            }
        }

    }

    public function actionCreate2()
    {
        $model = new Products();
        // Ajax
        $request = Yii::$app->getRequest();
        if ($request->isAjax && $model->load($request->post())) {
            Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        // General use
        if ($model->load($request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

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

    public function actionValidate()
    {
        $model = new Products();
        $request = \Yii::$app->getRequest();
        if ($request->isAjax && $model->load($request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\widgets\ActiveForm::validate($model);
        }
    }

}
