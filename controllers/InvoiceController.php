<?php

namespace app\controllers;

use Yii;
use app\models\Invoice;
use app\models\InvoiceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * InvoiceController implements the CRUD actions for Invoice model.
 */
class InvoiceController extends Controller
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
        $searchModel = new InvoiceSearch();
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
        $model = new Invoice();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->invoice_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->invoice_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Invoice::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionListByContractor()
    {



        $model_invoice = new Invoice();
        $searchModel = new InvoiceSearch();
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
            [$searchModel->formName() => ['dogovor_id' =>$merged_params['dogovor_id'] ]]
        ));

        return $this->renderAjax('dogovor_invoices',
            [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model_bank' => $model_invoice,
                'dogovor_id' => $merged_params['dogovor_id'] ,
            ]);


    }

}

