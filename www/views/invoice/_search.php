<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InvoiceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoice-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'invoice_id') ?>

    <?= $form->field($model, 'contractor_id') ?>

    <?= $form->field($model, 'executor_id') ?>

    <?= $form->field($model, 'number') ?>

    <?= $form->field($model, 'order_number') ?>

    <?php // echo $form->field($model, 'purchase_order') ?>

    <?php // echo $form->field($model, 'warehouse_name') ?>

    <?php // echo $form->field($model, 'h_s_code') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'net_weight') ?>

    <?php // echo $form->field($model, 'gross_weight') ?>

    <?php // echo $form->field($model, 'doc_template_id') ?>

    <?php // echo $form->field($model, 'paletts_info') ?>

    <?php // echo $form->field($model, 'payment_item') ?>

    <?php // echo $form->field($model, 'shipment') ?>

    <?php // echo $form->field($model, 'delivery_terms') ?>

    <?php // echo $form->field($model, 'total_pcs') ?>

    <?php // echo $form->field($model, 'total_summ') ?>

    <?php // echo $form->field($model, 'freight') ?>

    <?php // echo $form->field($model, 'document_date') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'dogovor_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
