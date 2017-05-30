<?php

use yii\helpers\Html;
use yii\grid\GridView;
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

$this->registerJsFile(
    '@web/js/modal_js/modal_products.js',
    ['depends' => [\yii\web\JqueryAsset::className()],

    ]
);

?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button(Yii::t('app', 'Create Products'),  ['value'=>Url::to('/products/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>

    </p>

    <?php
    Modal::begin([
        'header' => '<h4>' . Yii::t('app', 'Product') . '</h4>',
        'id' => 'modal-products',
        'size' => 'modal-lg',
        'toggleButton' => false,


    ]);

    echo "<div id='modalContent'> </div>";
    Modal::end();
    ?>


<?php Pjax::begin(['id' => 'pjax_products']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'products_id',
            'description_en',
            'description_ua',
            'part_number',
            'country_origin_en',
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
                            'class' => 'update_poducts',
                            'data-model-id' => $model->products_id,
                            'data-pjax' => 1,
                            // 'action' => $url,
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('yii', 'Delete'),
                            'class' => 'delete_poducts',
                            'data-model-id' => $model->products_id,
                            'data-pjax' => 1,
                        ]);
                    },

                ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>



