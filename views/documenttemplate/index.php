<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DocumentTemplateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Document Templates');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php


$this->registerJsFile(
    '@web/js/modal_js/templates/add.js', ['depends' => [\yii\web\JqueryAsset::className()]]

);


// обновление контрагента
$this->registerJsFile(
    '@web/js/modal_js/templates/index.js', ['depends' => [\yii\web\JqueryAsset::className()]]
);

// удаление контрагента
$this->registerJsFile(
    '@web/js/modal_js/templates/delete.js', ['depends' => [\yii\web\JqueryAsset::className()]]
);


?>
<div class="document-template-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Document Template'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin([

            'id' => 'pjax_templates',

        ]

    ); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'doc_templ_id',
            'name',
            'path_to_template',
            'contractor_id',
            'document_type',
            // 'date',

            ['class' => 'yii\grid\ActionColumn',
                /*'urlCreator'=>function ( $action,  $model,  $key,  $index,  $this) {
                return $key.'/'.$action;
                },*/

                'header' => 'Действия',
                'template' => '{view} / {update} / {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('yii', 'Update'),
                            'class' => 'update_templates',
                            'data-model-id' => $model->contractor_id,
                            'data-pjax' => 1,
                            // 'action' => $url,
                        ]);
                    },

                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('yii', 'Delete'),
                            'class' => 'delete_templates',
                            'data-model-id' => $model->contractor_id,
                            'data-pjax' => 1,
                            'data-method' => 'post',
                            // 'action' => $url,
                        ]);
                    },


                ]
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
