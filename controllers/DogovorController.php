<?php

namespace app\controllers;

use Yii;
use app\models\Dogovor;
use app\models\DogovorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;


class DogovorController extends Controller
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
        $searchModel = new DogovorSearch();
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
        $model_dogovor = new Dogovor(['scenario' => "create"]);

        $request = Yii::$app->getRequest();
        Yii::$app->response->format = Response::FORMAT_JSON;

        // если AJAX
        if ($request->isAjax) {

            if ($model_dogovor->load($request->post())) {

                if ($model_dogovor->validate()) {

                    $transaction = Yii::$app->db->beginTransaction();
                    try {
                        if ($model_dogovor->save(false)) {

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
                    return ['notify' => 0, 'notify_text' => Yii::t('app', 'The action was unsuccessful'), 'validate' => $model_dogovor->errors];

                }
            } else {
                return $this->renderAjax('create_form', [
                    'model_dogovor' => $model_dogovor,
                ]);
            }


        } else {
            return $this->render('create_form', [
                'model_dogovor' => $model_dogovor,
            ]);

        }


    }




    public function actionUpdate($id)
    {
        $model_dogovor = $this->findModel($id);
        $model_dogovor->scenario='update';
        $request = Yii::$app->getRequest();
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($request->isAjax) {
            if ($model_dogovor->load($request->post()) && $model_dogovor->validate()) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($model_dogovor->save(false)) {
                        $transaction->commit();
                        return ['notify' => 1, 'notify_text' => Yii::t('app', 'The action was successful'), 'validate' => '', /*'result' => $model->save()*/];
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                    return ['notify' => 0, 'notify_text' => Yii::t('app', 'The action was unsuccessful'), 'validate' => ''];
                }
            } else {
                return $this->renderAjax('create_form', [
                    'model_dogovor' => $model_dogovor,]);
            }
        } else {
            return $this->renderAjax('create_form', [
                'model_dogovor' => $model_dogovor,]);
        }

    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Dogovor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionAjaxValidate($scenario = false, $model_id = false)
    {
        if ($scenario == 'create') {
            $model = new Dogovor(['scenario' => $scenario]);
        } else {
            $model = $this->findModel($model_id);
            $model->scenario = $scenario;
        }
        $model->load(Yii::$app->request->post());
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }



}
