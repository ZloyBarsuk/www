<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SalesInvoiceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-invoice-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sales_order_confirmation') ?>

    <?= $form->field($model, 'sales_of') ?>

    <?= $form->field($model, 'inv_id') ?>

    <?= $form->field($model, 'prod_t_inv_id') ?>

    <?php // echo $form->field($model, 'delivery_note') ?>

    <?php // echo $form->field($model, 'delivery_of') ?>

    <?php // echo $form->field($model, 'departure_warehouse') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
