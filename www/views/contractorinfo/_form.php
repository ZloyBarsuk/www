<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContractorInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contractor-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_contractor')->textInput() ?>

    <?= $form->field($model, 'adress_official_ua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress_official_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress_post_ua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress_post_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'director_ua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'director_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_person')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tax_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vat_reg_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
