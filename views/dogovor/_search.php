<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DogovorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dogovor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'dogovor_id') ?>

    <?= $form->field($model, 'id_executor') ?>

    <?= $form->field($model, 'doc_template_id') ?>

    <?= $form->field($model, 'id_contractor') ?>

    <?= $form->field($model, 'id_bank_contractor') ?>

    <?php // echo $form->field($model, 'id_bank_executor') ?>

    <?php // echo $form->field($model, 'id_author') ?>

    <?php // echo $form->field($model, 'dogovor_number') ?>

    <?php // echo $form->field($model, 'delivery_date') ?>

    <?php // echo $form->field($model, 'comments') ?>

    <?php // echo $form->field($model, 'total_summ') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'closed_date') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'folder_path') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
