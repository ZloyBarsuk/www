<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;


use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use app\models\Contractor;


// $this->registerJsFile('@web/js/modal_js/banks/add.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
// $this->registerJsFile('@web/js/modal_js/banks/index.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
// $this->registerJsFile('@web/js/modal_js/banks/delete.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/modal_js/banks/refresh.js', ['depends' => [\yii\web\JqueryAsset::className()]]);


?>

<?= Html::button(Yii::t('app', 'TEST PJAX'), ['value' => '', 'class' => 'btn btn-success', 'id' => 'pjax_button']) ?>

<?php

// $this->registerJsFile('/js/modal_js/banks/create.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

?>

<?php
/*Pjax::begin(['id' => 'banks-list-modal-pjax',
    'timeout' => false,
    'enablePushState' => false,
    'clientOptions' => ['method' => 'POST']])*/
?>



<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'headerRowOptions' => ['class' => 'kartik-sheet-style'],
   // 'captionOptions' => ['data-method' => 'post',],
    'options' => [
    'id'=>'contractor_banks_modal',
    'data-controller' => "/banks/bankslist/$contractor_id",

    ],

    'panel' => [
        'type' => GridView::TYPE_PRIMARY,

    ],
    'pjax' => true,
    'filterUrl' => Url::to(["banks/bankslist/$contractor_id"]),
    'toolbar' => [
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
    ],
    'pjaxSettings' => [
        'timeout' => false,
        'neverTimeout' => false,

        'beforeGrid' => 'My fancy content before.',
        'afterGrid' => 'My fancy content after.',

        'method' => 'post',

        'options' => [
            'id' => 'contractor-banks-grid',
            'enablePushState' => false,
            'timeout' => false,


        ]
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        // 'bank_id',
        'name_ua',
        'name_en',
        'inn',
        'kpp',
        // 'ogrm',
        // 'adress_official_ua',
        // 'adress_official_en',
        // 'adress_post_ua',
        // 'adress_post_en',
        // 'r_s',
        // 'k_s',
        // 'bic',
        // 'swift',
        // 'account_type',
        // 'created_at',
        // 'created_by',
        // 'contractor_id',
        // 'by_default',

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
                        'class' => 'update_banks',
                        'data-model-id' => $model->bank_id,
                        'data-pjax' => 1,
                        // 'action' => $url,
                    ]);
                },
                'delete' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'title' => Yii::t('yii', 'Delete'),
                        'class' => 'delete_banks',
                        'data-model-id' => $model->bank_id,
                        'data-pjax' => 1,
                        'data-method' => 'post',

                        // 'action' => $url,
                    ]);
                },

            ]
        ],
    ],
]); ?>

<?php // yii\widgets\Pjax::end() ?>