<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Invoice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoice-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contractor_id')->textInput() ?>

    <?= $form->field($model, 'executor_id')->textInput() ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'purchase_order')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'warehouse_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h_s_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'net_weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gross_weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_template_id')->textInput() ?>

    <?= $form->field($model, 'paletts_info')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payment_item')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shipment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delivery_terms')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_pcs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_summ')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'freight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'document_date')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'dogovor_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
