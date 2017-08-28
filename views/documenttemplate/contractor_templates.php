<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DocumentTemplateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Document Templatesыы');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php

$this->registerJsFile('@web/js/modal_js/templates/create.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/modal_js/templates/add.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/modal_js/templates/delete.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/modal_js/templates/update.js', ['depends' => [\yii\web\JqueryAsset::className()]]);


?>
<p>
    <?= Html::button(Yii::t('app', 'Create Template'), ['value' => Url::to('/documenttemplate/create'), 'class' => 'btn btn-success', 'id' => 'add_template_modal']) ?>

</p>
<div class="document-template-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider_templ,
        'filterModel' => $searchModel_templ,
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        // 'captionOptions' => ['data-method' => 'post',],
        'options' => [
            'id' => 'contractor_banks_modal',
            'data-controller' => "/documenttemplate/list-by-contractor",
            'data-contractor_id' => "$contractor_id",
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
            'beforeGrid' => '<strong>Список всех шаблонов по контрагенту</strong>',
            'afterGrid' => '',
            'method' => 'post',
            'options' => [
                'id' => 'contractor-templates-grid',
                'enablePushState' => false,
                'timeout' => false,
            ]
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'bank_id',
            'name',
            'document_type',
            'date',
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
                            'class' => 'update_templates',
                            'data-model-id' => $model->doc_templ_id,
                            'data-pjax' => 1,
                            // 'action' => $url,
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('yii', 'Delete'),
                            'class' => 'delete_templates',
                            'data-model-id' => $model->doc_templ_id,
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
