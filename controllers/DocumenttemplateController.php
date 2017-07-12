<?php

namespace app\controllers;

use Yii;
use app\models\DocumentTemplate;
use app\models\DocumentTemplateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * DocumenttemplateController implements the CRUD actions for DocumentTemplate model.
 */
class DocumenttemplateController extends Controller
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
     * Lists all DocumentTemplate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DocumentTemplateSearch();
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
        $model_template = new DocumentTemplate(['scenario'=>'create']);
        $request = Yii::$app->getRequest();
        Yii::$app->response->format = Response::FORMAT_JSON;
        $contractor_id = !empty($request->post('contractor_id')) ? $request->post('contractor_id') : '';
        $model_template->contractor_id = $contractor_id;
        // если AJAX
        if ($request->isAjax) {

            if ($model_template->load($request->post())) {

                if ($model_template->validate()) {

                    $transaction = Yii::$app->db->beginTransaction();
                    try {
                        if ($model_template->save(false)) {

                            $transaction->commit();
                            return ['notify' => 1, 'responseText' => Yii::t('app', 'The action was successful')];

                        } else {
                            $transaction->rollBack();
                            return ['notify' => 0, 'responseText' => Yii::t('app', 'The action was unsuccessful')];

                        }
                    } catch (Exception $e) {
                        $transaction->rollBack();
                        return ['notify' => 0, 'responseText' => Yii::t('app', 'The action was unsuccessful')];
                    }
                } else {
                    return ['notify' => 0, 'responseText' => Yii::t('app', 'The action was unsuccessful'), 'validate' => $model_template->errors];

                }
            } else {
                return $this->renderAjax('create_form', [
                    'model_template' => $model_template,
                    // 'contractor_flag'=>$contractor_id,

                ]);
            }


        } else {
            return $this->render('create_form', [
                'model_template' => $model_template,
                //  'contractor_flag'=>$contractor_id,

            ]);

        }
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->doc_templ_id]);
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
        if (($model = DocumentTemplate::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionTemplatesByContractor()
    {

        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $contractor_id = $parents[0];
                $out = DocumentTemplate::AllTemplatesContractorDropdown($contractor_id, 'dogovor');
                $out = ArrayHelper::map($out, 'doc_templ_id', 'name');
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
    }

    public function actionAjaxValidate($scenario = false, $model_id = false)
    {
        if ($scenario == 'create') {
            $model = new DocumentTemplate(['scenario' => $scenario]);
        } else {
            $model = $this->findModel($model_id);
            $model->scenario = $scenario;
        }
        $model->load(Yii::$app->request->post());
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }

}
