<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DocumentTemplateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-template-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'doc_templ_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'path_to_template') ?>

    <?= $form->field($model, 'contractor_id') ?>

    <?= $form->field($model, 'document_type') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
