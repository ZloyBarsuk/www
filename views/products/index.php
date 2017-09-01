<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php

$this->registerJsFile('@web/js/modal_js/products/add.js', ['depends' => [\yii\web\JqueryAsset::className()],]);
$this->registerJsFile('@web/js/modal_js/products/update.js', ['depends' => [\yii\web\JqueryAsset::className()],]);
$this->registerJsFile('@web/js/modal_js/products/delete.js', ['depends' => [\yii\web\JqueryAsset::className()],]);

?>
<div class="products-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button(Yii::t('app', 'Create Products'), ['value' => Url::to('/products/create'), 'class' => 'btn btn-success', 'id' => 'modalButtonProducts']) ?>

    </p>


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
                'enablePushState' => false,
                // 'method' => 'POST',
                'options' => [
                    'id' => 'products_grid',
                    'enablePushState' => true,
                    'timeout' => false,
                ]
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                // 'products_id',
                'part_number',
                'description_en',
                'description_ua',
                'price',
                //   'country_origin_en',
                // 'country_origin_ua',
                // 'tarif_number_en',
                // 'tarif_number_ua',
                // 'weight',
                // 'height',
                // 'width',
                // 'length',
                // 'price',
                // 'active',
                // 'created_at',

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
                                'class' => 'update_products',
                                'data-cont_id' => $model->products_id,
                                'data-pjax' => 1,
                                // 'action' => $url,
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => Yii::t('yii', 'Delete'),
                                'class' => 'delete_products',
                                'data-cont_id' => $model->products_id,
                                'data-pjax' => 1,
                                'data-method' => 'post',

                                // 'action' => $url,
                            ]);
                        },

                    ]
                ],
            ],
        ]); ?>

