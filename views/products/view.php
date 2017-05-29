<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->products_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->products_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->products_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'products_id',
            'description_en',
            'description_ua',
            'part_number',
            'country_origin_en',
            'country_origin_ua',
            'tarif_number_en',
            'tarif_number_ua',
            'weight',
            'height',
            'width',
            'length',
            'price',
            'active',
            'created_at',
        ],
    ]) ?>

</div>
