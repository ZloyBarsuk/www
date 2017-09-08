<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use app\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\Json;
use yii\db\Query;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
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
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
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
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products(['scenario' => "create"]);
        $model->loadDefaultValues();
        $request = Yii::$app->getRequest();
        Yii::$app->response->format = Response::FORMAT_JSON;

        // если AJAX
        if ($request->isAjax) {

            if ($model->load($request->post()) && $model->validate()) {

                if ($model->save(false)) {
                    return ['notify' => 1, 'notify_text' => Yii::t('app', 'The action was successful')];

                } else {
                    return ['notify' => 0, 'notify_text' => Yii::t('app', 'The action was unsuccessful')];


                }


            } else {
                return $this->renderAjax('_form', [
                    'model' => $model,


                ]);
            }


        } else {
            return $this->render('_form', ['model' => $model]);

        }
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';
        $request = Yii::$app->getRequest();
        if ($request->isAjax) {
            if ($model->load($request->post()) && $model->validate()) {
                Yii::$app->response->format = Response::FORMAT_JSON;

                $ajaxValidate = ActiveForm::validate($model);

                if (count($ajaxValidate) > 0) {
                    return ['notify' => 0, 'notify_text' => Yii::t('app', 'The update was unsuccessful'), 'validate' => $ajaxValidate];
                }

                return ['notify' => 1, 'notify_text' => Yii::t('app', 'The update was successful'), 'validate' => $ajaxValidate, 'result' => $model->save()];


            } else {
                return $this->renderAjax('_form', [
                    'model' => $model,


                ]);
            }
        } else {
            return $this->renderAjax('_form', [
                'model' => $model,
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

    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAjaxValidate($scenario = false, $model_id = false)
    {
        if ($scenario == 'create') {
            $model = new Products(['scenario' => $scenario]);
        } else {
            $model = $this->findModel($model_id);
            $model->scenario = $scenario;
        }
        $model->load(Yii::$app->request->post());
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }




    public function actionDropdownForInvoice($q = null, $id = null)
    {

        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select(['CONCAT(part_number,"  =>    ",description_en) AS text', 'products_id AS id'])

                ->from('products')
                ->where(['like', 'part_number', $q]);

            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Products::find($id)->description_en];
        }
        return $out;
    }


}
