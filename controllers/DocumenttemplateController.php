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
        $model = new DocumentTemplate();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->doc_templ_id]);
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
                $out = DocumentTemplate::AllTemplatesContractorDropdown($contractor_id,'dogovor');
                $out = ArrayHelper::map($out, 'doc_templ_id', 'name');
                $result = [];
                $tmp_arr = [];
                foreach($out as $key => $value)
                {
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






























}
