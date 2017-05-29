<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SalesInvoice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-invoice-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sales_order_confirmation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sales_of')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inv_id')->textInput() ?>

    <?= $form->field($model, 'prod_t_inv_id')->textInput() ?>

    <?= $form->field($model, 'delivery_note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delivery_of')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'departure_warehouse')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
