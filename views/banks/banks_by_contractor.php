<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BanksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Banks');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php

$this->registerJsFile('@web/js/modal_js/banks/add.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/modal_js/banks/update.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/modal_js/banks/delete.js', ['depends' => [\yii\web\JqueryAsset::className()]]);


?>

<div class="banks-index">


    <p>
        <?= Html::button(Yii::t('app', 'Create Banks'), ['value' => Url::to('/banks/create'), 'class' => 'btn btn-success', 'id' => 'modalButtonBanks']) ?>
    </p>
    <?php
    Modal::begin([
        'options' => [
            'id' => 'modal-banks',
            'tabindex' => false // important for Select2 to work properly
        ],

        'header' => '<h5>' . Yii::t('app', 'Заполнение данных банка') . '</h5>',
        //   'footer' => '<div class="form-group"><div class="col-md-5 col-xs-10"></div></div>',

        'size' => 'modal-lg',
        'toggleButton' => false,

        'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
    ]);

    echo "<div id='modalContentBanks'> </div>";
    Modal::end();
    ?>

    <?php Pjax::begin(
            [
            'id' => 'pjax_banks',
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
    <?php Pjax::end(); ?></div>
