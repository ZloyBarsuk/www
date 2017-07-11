<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContractorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contractor');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php

$this->registerJsFile(
    '@web/js/modal_js/common/tabs_loader_contractor.js', ['depends' => [\yii\web\JqueryAsset::className()]]

);
$this->registerJsFile(
    '@web/js/modal_js/contractor/add.js', ['depends' => [\yii\web\JqueryAsset::className()]]

);


// обновление контрагента
$this->registerJsFile(
    '@web/js/modal_js/contractor/index.js', ['depends' => [\yii\web\JqueryAsset::className()]]
);

// удаление контрагента
$this->registerJsFile(
    '@web/js/modal_js/contractor/delete.js', ['depends' => [\yii\web\JqueryAsset::className()]]
);


?>

<div class="contractor-index">

    <!-- <h1><? /*= Html::encode($this->title) */ ?></h1>-->
    <?php
    //  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button(Yii::t('app', 'Create Contractor'), ['value' => Url::to('/contractor/create'), 'class' => 'btn btn-success', 'id' => 'modalButtonContractor']) ?>
    </p>

    <?php
    Modal::begin([
        'options' => [
            'id' => 'modal-contractor',
            'tabindex' => false // important for Select2 to work properly
        ],
        'header' => '<h5>' . Yii::t('app', 'Заполнение данных Контрагента') . '</h5>',
        //   'footer' => '<div class="form-group"><div class="col-md-5 col-xs-10"></div></div>',


        'size' => 'modal-lg',
        'toggleButton' => false,
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],

    ]);

    echo "<div id='modalContentContractor'> </div>";
    Modal::end();
    ?>


    <?php Pjax::begin([

            'id' => 'pjax_contractor',

        ]

    ); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'contractor_id',
            'name_en',
            'name_ua',

            //  'signature',
            [
                'attribute' => 'Банки',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a(Html::encode('список банков'), ['banks/bankslist/', 'id' => $model->contractor_id], ['class' => 'banks_by_contractor']);
                },
            ],
            [
                'attribute' => 'Печать',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->signature != '')
                        //   return '<img src="/uploads/signatures/'.$model->signature.'" width="50px" height="auto">'; else return 'нет печати';
                        return '<div class="signature"  style="text-align:center;"><img src="/uploads/signatures/' . $model->signature . '" width="50px" height="auto">'; else return 'нет печати' . "</div>";


                },
            ],

            // 'created_at',
            // 'created_by',
            // 'contractor_type',

            ['class' => 'yii\grid\ActionColumn',
                /*'urlCreator'=>function ( $action,  $model,  $key,  $index,  $this) {
                return $key.'/'.$action;
                },*/

                'header' => 'Действия',
                'template' => '{update}{delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('yii', 'Update'),
                            'class' => 'update_contractor',
                            'data-model-id' => $model->contractor_id,
                            'data-pjax' => 1,
                            // 'action' => $url,
                        ]);
                    },

                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('yii', 'Delete'),
                            'class' => 'delete_contractor',
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
