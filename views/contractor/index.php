<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;


$this->title = Yii::t('app', 'Contractor');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php

$this->registerJsFile(
    '@web/js/modal_js/contractor/tabs_loader_contractor.js', ['depends' => [\yii\web\JqueryAsset::className()]]

);
$this->registerJsFile(
    '@web/js/modal_js/contractor/add.js', ['depends' => [\yii\web\JqueryAsset::className()]]

);

$this->registerJsFile(
    '@web/js/modal_js/contractor/update.js', ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJsFile(
    '@web/js/modal_js/contractor/delete.js', ['depends' => [\yii\web\JqueryAsset::className()]]
);


?>

    <div class="contractor-index">

    <!-- <h1><? /*= Html::encode($this->title) */ ?></h1>-->
<?php
//  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button(Yii::t('app', 'Create Contractor'), ['value' => Url::to('/contractor/create'), 'class' => 'btn btn-success', 'id' => 'CreateContractor']) ?>
    </p>


<?php
/*Pjax::begin(

    [
        'id' => 'contractors-index-pjax',
        'timeout' => false,
        'enablePushState' => false,
        // 'clientOptions' => ['method' => 'POST']
    ]
)*/
?>

<?= GridView::widget(

    [
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'captionOptions' =>
            [
                //  'data-method' => 'post'
            ],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
        ],
        'pjax' => true,
        'pjaxSettings' => [
            'timeout' => false,
            'neverTimeout' => false,
            'enablePushState' => true,
            // 'method' => 'POST',
            'options' => [
                'id' => 'contractors_grid',
                'enablePushState' => true,
                'timeout' => false,
            ]
        ],
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
                    return Html::a(Html::encode('список банков'), ['/banks/banks-list', ], ['class' => 'banks_by_contractor','data-contr_id' => $model->contractor_id]);
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
                            'data-cont_id' => $model->contractor_id,
                            'data-pjax' => 1,
                            // 'action' => $url,
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('yii', 'Delete'),
                            'class' => 'delete_contractor',
                            'data-cont_id' => $model->contractor_id,
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