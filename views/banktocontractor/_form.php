<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BankToContractor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-to-contractor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_contractor')->textInput() ?>

    <?= $form->field($model, 'id_bank')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
