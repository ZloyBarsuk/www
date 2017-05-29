<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsToInvoice */

$this->title = $model->pr_to_inv_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products To Invoices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-to-invoice-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->pr_to_inv_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->pr_to_inv_id], [
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
            'pr_to_inv_id',
            'invoice_id',
            'item_number',
            'remark',
            'product_id',
            'quantity',
            'unit',
            'unit_price_manual',
            'total_price',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
