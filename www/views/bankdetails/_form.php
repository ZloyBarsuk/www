<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BankDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_bank')->textInput() ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ogrm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress_official_ua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress_official_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress_post_ua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress_post_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'r_s')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'k_s')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'swift')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'account_type')->dropDownList([ 'rub' => 'Rub', 'eur' => 'Eur', 'usd' => 'Usd', 'uah' => 'Uah', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
