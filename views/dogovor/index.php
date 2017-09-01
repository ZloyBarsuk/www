<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DogovorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Dogovors');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$this->registerJsFile('@web/js/modal_js/dogovor/tabs_loader_dogovor.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/modal_js/dogovor/create.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/modal_js/dogovor/add.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/modal_js/dogovor/delete.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/modal_js/dogovor/update.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

?>


<div class="dogovor-index">


    <p>
        <?= Html::button(Yii::t('app', 'Create Dogovor'), ['value' => Url::to('/dogovor/create'), 'class' => 'btn btn-success', 'id' => 'add_dogovor_index']) ?>
    </p>


    <div>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'headerRowOptions' => ['class' => 'kartik-sheet-style'],
            // 'captionOptions' => ['data-method' => 'post',],
            'options' => [
                'id' => 'dogovors_modal',
                'data-controller' => "/dogovor/full-list",
                'data-dogovor_id' => "$model->id_executor",
            ],

            'panel' => [
                'type' => GridView::TYPE_PRIMARY,

            ],
            'pjax' => true,
            // 'filterUrl' => Url::to(["banks/bankslist/$contractor_id"]),
            /* 'toolbar' => [
                 [
                     'content' =>
                         Html::button('<i class="glyphicon glyphicon-plus"></i>', [
                             'type' => 'button',
                             'title' => Yii::t('kvgrid', 'Add Book'),
                             'class' => 'btn btn-success'
                         ]) . ' ' .
                         Html::a('<i class="glyphicon glyphicon-repeat"></i>', ["/banks/bankslist/$contractor_id"], [
                             'class' => 'btn btn-default',
                             'id' => 'refresh_grid',
                             'title' => Yii::t('kvgrid', 'Reset Grid')
                         ]),

                 ],
                 '{export}',
                 '{toggleData}'
             ],*/
            'pjaxSettings' => [
                'timeout' => false,
                'neverTimeout' => false,
                'beforeGrid' => '<strong>Список всех договоров</strong>',
                'afterGrid' => '',
                'method' => 'post',
                'options' => [
                    'id' => 'dogovors-grid',
                    'enablePushState' => false,
                    'timeout' => false,
                ]
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'dogovor_id',
                'id_executor',
                'doc_template_id',
                'id_contractor',
                'id_bank_contractor',
                // 'id_bank_executor',
                // 'id_author',
                // 'dogovor_number',
                // 'delivery_date',
                // 'comments:ntext',
                // 'total_summ',
                // 'created_date',
                // 'closed_date',
                // 'updated_date',
                // 'status',
                // 'folder_path:ntext',

                ['class' => 'yii\grid\ActionColumn',
                    /*'urlCreator'=>function ( $action,  $model,  $key,  $index,  $this) {
                    return $key.'/'.$action;
                    },*/
                    'header' => 'Действия',
                    'template' => '{update} / {delete} /',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'title' => Yii::t('yii', 'Update'),
                                'class' => 'update_dogovors',
                                'data-model-id' => $model->dogovor_id,
                                'data-pjax' => 1,
                                // 'action' => $url,
                            ]);


                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => Yii::t('yii', 'Delete'),
                                'class' => 'delete_dogovors',
                                'data-model-id' => $model->dogovor_id,
                                'data-pjax' => 1,
                                'data-method' => 'post',

                                // 'action' => $url,
                            ]);
                        },

                    ]
                ],
            ],
        ]); ?>

    </div>
