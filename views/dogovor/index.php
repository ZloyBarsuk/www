<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DogovorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Dogovors');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php

$this->registerJsFile('@web/js/modal_js/dogovor/add.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/modal_js/dogovor/update.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/modal_js/dogovor/delete.js', ['depends' => [\yii\web\JqueryAsset::className()]]);


?>
<div class="dogovor-index">


    <p>
        <?= Html::button(Yii::t('app', 'Create Dogovor'), ['value' => Url::to('/dogovor/create'), 'class' => 'btn btn-success', 'id' => 'modalButtonDogovor']) ?>
    </p>
    <?php
    Modal::begin([
        'options' => [
            'id' => 'modal-dogovor',
            'tabindex' => false // important for Select2 to work properly
        ],
        'header' => '<h5>' . Yii::t('app', 'Заполнение данных договора') . '</h5>',
        //   'footer' => '<div class="form-group"><div class="col-md-5 col-xs-10"></div></div>',
        'size' => 'modal-lg',
        'toggleButton' => false,
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
    ]);

    echo "<div id='modalContentDogovor'> </div>";
    Modal::end();
    ?>

    <?php Pjax::begin(
        [
            'id' => 'pjax_dogovors',
        ]

    ); ?>   <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
    <?php Pjax::end(); ?></div>
