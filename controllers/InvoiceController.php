<?php

namespace app\controllers;

use Yii;
use app\models\Invoice;
use app\models\InvoiceSearch;
use app\models\ProductsToInvoice;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use app\models\Model;



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


    public function actionCreate_original()
    {
        $model = new Invoice();

        //  $model_contr = new Contractor(['scenario' => "create"]);
        //  $model_contr_info = new ContractorInfo();
        //   $model_media = new MediaForm();
        $request = Yii::$app->getRequest();


      //  if( empty($request->post('dogovor_id')) || empty($request->post('dogovor_contractor')) || empty($request->post('dogovor_executor')) )
        if( empty($request->post('dogovor_id')) && (empty($request->post('dog_contractor')) && empty($request->post('dog_executor'))))

        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['notify' => 0, 'responseText' => Yii::t('app', 'Не указали № договора, поставщика и покупателя')];


        }
        else{
            $model->dogovor_id =  $request->post('dogovor_id');
            $model->contractor_id = $request->post('dog_contractor');
            $model->executor_id =  $request->post('dog_executor');
        }


        // если AJAX
        if ($request->isAjax) {

            if ($model->load($request->post())) {

                if ($model->validate()) {

                    $transaction = Yii::$app->db->beginTransaction();
                    try {
                        if ($model->save(false)) {

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
                    return ['notify' => 0, 'notify_text' => Yii::t('app', 'The action was unsuccessful'), 'validate' => $model->errors];

                }
            } else {
                return $this->renderAjax('ketek_form', [
                    'model_invoice' => $model,
                    // 'contractor_flag'=>$contractor_id,

                ]);
            }


        } else {
            return $this->renderAjax('ketek_form', [
                'model_invoice' => $model,
                //  'contractor_flag'=>$contractor_id,

            ]);

        }





    }


    public function actionUpdate_original($id)
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






    public function actionCreate()
    {
        $modelInvoice = new Invoice();
        $request = Yii::$app->getRequest();


        //  if( empty($request->post('dogovor_id')) || empty($request->post('dogovor_contractor')) || empty($request->post('dogovor_executor')) )
        if( empty($request->post('dogovor_id')) && (empty($request->post('dog_contractor')) && empty($request->post('dog_executor'))))

        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['notify' => 0, 'responseText' => Yii::t('app', 'Не указали № договора, поставщика и покупателя')];


        }
        else{
            $modelInvoice->dogovor_id =  $request->post('dogovor_id');
            $modelInvoice->contractor_id = $request->post('dog_contractor');
            $modelInvoice->executor_id =  $request->post('dog_executor');
        }

        $modelProductsToInvoice = [new ProductsToInvoice()];
        if ($modelInvoice->load(Yii::$app->request->post())) {

            $modelProductsToInvoice = Model::createMultiple(ProductsToInvoice::classname());
            Model::loadMultiple($modelProductsToInvoice, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelProductsToInvoice),
                    ActiveForm::validate($modelInvoice)
                );
            }

            // validate all models
            $valid = $modelInvoice->validate();
            $valid = Model::validateMultiple($modelProductsToInvoice) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelInvoice->save(false)) {
                        foreach ($modelProductsToInvoice as $modelProductInvoice) {
                            $modelProductInvoice->invoice_id = $modelInvoice->invoice_id;
                            if (! ($flag = $modelProductInvoice->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                    //    return $this->redirect(['ketek_form', 'id' => $modelInvoice->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->renderAjax('ketek_form', [
            'modelInvoice' => $modelInvoice,
            'modelsProductsInvoice' => (empty($modelProductsToInvoice)) ? [new ProductsToInvoice()] : $modelProductsToInvoice
        ]);
    }


    public function actionUpdate($id)
    {
        $modelInvoice = $this->findModel($id);
        $modelProductsToInvoice = $modelInvoice->addresses;

        if ($modelInvoice->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelProductsToInvoice, 'id', 'id');
            $modelProductsToInvoice = Model::createMultiple(Address::classname(), $modelProductsToInvoice);
            Model::loadMultiple($modelProductsToInvoice, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelProductsToInvoice, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelProductsToInvoice),
                    ActiveForm::validate($modelInvoice)
                );
            }

            // validate all models
            $valid = $modelInvoice->validate();
            $valid = Model::validateMultiple($modelProductsToInvoice) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelInvoice->save(false)) {
                        if (! empty($deletedIDs)) {
                            Address::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelProductsToInvoice as $modelAddress) {
                            $modelAddress->customer_id = $modelInvoice->id;
                            if (! ($flag = $modelAddress->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelInvoice->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'modelCustomer' => $modelInvoice,
            'modelsAddress' => (empty($modelProductsToInvoice)) ? [new Address] : $modelProductsToInvoice
        ]);
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
                'contractor_id' => $request->post('dog_contractor') ,
                'executor_id' =>$request->post('dog_executor') ,
            ]);


    }

}

