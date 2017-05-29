<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Invoice */

$this->title = $model->invoice_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Invoices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->invoice_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->invoice_id], [
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
            'invoice_id',
            'contractor_id',
            'executor_id',
            'number',
            'order_number',
            'purchase_order',
            'warehouse_name',
            'h_s_code',
            'comment',
            'net_weight',
            'gross_weight',
            'doc_template_id',
            'paletts_info',
            'payment_item',
            'shipment',
            'delivery_terms',
            'total_pcs',
            'total_summ',
            'freight',
            'document_date',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'dogovor_id',
        ],
    ]) ?>

</div>
