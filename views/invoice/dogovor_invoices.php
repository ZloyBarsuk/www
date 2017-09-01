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
// $this->registerJsFile('@web/js/modal_js/banks/update.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
// $this->registerJsFile('@web/js/modal_js/banks/delete.js', ['depends' => [\yii\web\JqueryAsset::className()]]);


?>

<?php
// $this->registerJsFile('@web/js/modal_js/banks/pjax_reload.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>

<?php
$this->registerJsFile('@web/js/modal_js/invoice/create.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/modal_js/invoice/add.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/modal_js/invoice/delete.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/modal_js/invoice/update.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

?>


<p>
    <?= Html::button(Yii::t('app', 'Create Invoice'), ['value' => Url::to('/invoice/create'), 'class' => 'btn btn-success', 'id' => 'add_invoice_modal']) ?>

</p>


<div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        // 'captionOptions' => ['data-method' => 'post',],
        'options' => [
            'id' => 'contractor_dogovor_invoices_modal',
            'data-controller' => "/invoice/invoice-list",
            'data-dogovor_id' => "$dogovor_id",
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
            'beforeGrid' => '<strong>Список всех инвойсов (модалка)</strong>',
            'afterGrid' => '',
            'method' => 'post',
            'options' => [
                'id' => 'dogovor-invoice-grid',
                'enablePushState' => false,
                'timeout' => false,
            ]
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
         //   'invoice_id',
          //  'contractor_id',
          //  'executor_id',
            'number',

            'order_number',
            'total_summ',
            // 'purchase_order',
            // 'warehouse_name',
            // 'h_s_code',
            // 'comment',
            // 'net_weight',
            // 'gross_weight',
            // 'doc_template_id',
            // 'paletts_info',
            // 'payment_item',
            // 'shipment',
            // 'delivery_terms',
            // 'total_pcs',
            // 'total_summ',
            // 'freight',
            // 'document_date',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'dogovor_id',


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
                            'class' => 'update_invocies_dogovor',
                            'data-model-id' => $model->invoice_id,
                            'data-pjax' => 1,
                            // 'action' => $url,
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('yii', 'Delete'),
                            'class' => 'delete_invocies_dogovor',
                            'data-model-id' => $model->invoice_id,
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