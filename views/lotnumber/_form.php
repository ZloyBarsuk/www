<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LotNumber */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lot-number-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'inv_id')->textInput() ?>

    <?= $form->field($model, 'prod_t_inv_id')->textInput() ?>

    <?= $form->field($model, 'external_lot_number_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'external_lot_number_ua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alloc_quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
