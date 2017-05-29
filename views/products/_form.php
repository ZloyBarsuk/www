<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_ua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'part_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_origin_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_origin_ua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tarif_number_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tarif_number_ua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'width')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'length')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->dropDownList([ 'y' => 'Y', 'n' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
