<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DocumentTemplate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-template-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'path_to_template')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contractor_id')->textInput() ?>

    <?= $form->field($model, 'document_type')->dropDownList([ 'dogovor' => 'Dogovor', 'invoice' => 'Invoice', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
