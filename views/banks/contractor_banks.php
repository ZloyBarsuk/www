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


?>

<?= Html::button(Yii::t('app', 'TEST PJAX'), ['value' => '', 'class' => 'btn btn-success', 'id' => 'pjax_button']) ?>
<?php

// $this->registerJsFile('/js/modal_js/banks/create.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

?>

<?php
$this->registerJs('
$( "body #pjax_button" ).off();

$(\'#pjax_button\').on(\'click\', function (event) {
    event.stopPropagation();
    alert(\'cccccccccccccccccccc\');
    // $.pjax.defaults.timeout = 5000;//IMPORTANT
    // alert(\'ready\');
    // $( "#refresh_grid" ).trigger( "click" );
    // event.stopPropagation();
// $( "body" ).data(); // { foo: 52, bar: { myType: "test", count: 40 }, baz: [ 1, 2, 3 ] }

    var grid_data=$(\'body #contractor_banks_modal\').data();

   // alert(JSON.stringify(grid_data));
    // $.pjax.reload({container:\'#contractor-banks-grid\', replaceRedirect:false, replace:true});
    $.pjax.reload({
        container: \'#contractor-banks-grid\',
        push: true,
        url:grid_data.controller,
        data:{\'contractor_id\':grid_data.contractor_id},
        history: false,
        cache: false,
        datatype:\'html\',
        replaceRedirect: false,
        replace: true,
        type: \'GET\',
        timeout: 3000
    });

    return false;



});
');
?>
<?php

// $this->registerJsFile('/js/modal_js/banks/create.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
 $this->registerJsFile('/js/modal_js/banks/pjax_reload.js', ['depends' => [\yii\web\JqueryAsset::className()]]);




?>


<div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'headerRowOptions' => ['class' => 'kartik-sheet-style'],
   // 'captionOptions' => ['data-method' => 'post',],
    'options' => [
    'id'=>'contractor_banks_modal',
    'data-controller' => "/banks/banks-list",
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

</div>