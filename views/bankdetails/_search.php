<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BankDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bank_det_id') ?>

    <?= $form->field($model, 'id_bank') ?>

    <?= $form->field($model, 'inn') ?>

    <?= $form->field($model, 'kpp') ?>

    <?= $form->field($model, 'ogrm') ?>

    <?php // echo $form->field($model, 'adress_official_ua') ?>

    <?php // echo $form->field($model, 'adress_official_en') ?>

    <?php // echo $form->field($model, 'adress_post_ua') ?>

    <?php // echo $form->field($model, 'adress_post_en') ?>

    <?php // echo $form->field($model, 'r_s') ?>

    <?php // echo $form->field($model, 'k_s') ?>

    <?php // echo $form->field($model, 'bic') ?>

    <?php // echo $form->field($model, 'swift') ?>

    <?php // echo $form->field($model, 'account_type') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
