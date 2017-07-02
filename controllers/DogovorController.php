<?php

namespace app\controllers;

use Yii;
use app\models\Dogovor;
use app\models\DogovorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DogovorController implements the CRUD actions for Dogovor model.
 */
class DogovorController extends Controller
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
     * Lists all Dogovor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DogovorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dogovor model.
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
     * Creates a new Dogovor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model_dogovor = new Dogovor(); // ['scenario' => "create"]
        $request = Yii::$app->getRequest();
        // если AJAX
        if ($request->isAjax) {

            if ($model_dogovor->load($request->post())) {


                $model_dogovor->load($request->post());
                $valid = $model_dogovor->validate();
                $valid = $model_dogovor->validate() && $valid;
                if ($valid) {
                    // добавляем картинку
                    empty($model_dogovor->signature) ? $model_dogovor->signature = 'empty.png' : '';
                    $transaction = \Yii::$app->db->beginTransaction();
                    try {
                        if ($flag = $model_dogovor->save(false)) {

                            $model_dogovor->id_contractor = $model_dogovor->contractor_id;
                            if (!($flag = $model_dogovor->save(false))) {
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
                    'model_dogovor' => $model_dogovor,


                ]);
            }


        } else {
            return $this->render('create_form', [
                'model_dogovor' => $model_dogovor,

            ]);

        }


    }

    /**
     * Updates an existing Dogovor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->dogovor_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Dogovor model.
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
     * Finds the Dogovor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dogovor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dogovor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
