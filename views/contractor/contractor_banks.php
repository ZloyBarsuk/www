<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;





$this->registerJsFile('@web/js/modal_js/banks/add.js');
$this->registerJsFile('@web/js/modal_js/banks/index.js');
$this->registerJsFile('@web/js/modal_js/banks/delete.js');

$this->registerJsFile(
    '@web/js/modal_js/banks/refresh.js', ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>
<?= Html::button(Yii::t('app', 'Create Banks'), ['value' => Url::to('/banks/create'), 'class' => 'btn btn-success', 'id' => 'modalButtonBanks']) ?>


<?php Pjax::begin(
    [
        'id' => 'pjax_banks',
        'clientOptions' => ['method' => 'POST'],
        'timeout' => false,
        'enablePushState' => false,
    ]

); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
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
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '/banks/update/', [
                        'title' => Yii::t('yii', 'Update'),
                        'class' => 'update_banks',
                        'data-model-id' => $model->bank_id,
                        'data-pjax' => 1,
                        // 'action' => $url,
                    ]);
                },
                'delete' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', '/banks/delete/', [
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
<?php Pjax::end(); ?></div>
