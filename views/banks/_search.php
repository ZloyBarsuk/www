<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BanksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banks-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bank_id') ?>

    <?= $form->field($model, 'name_ua') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'inn') ?>

    <?= $form->field($model, 'kpp') ?>

    <?php // echo $form->field($model, 'ogrm') ?>

    <?php // echo $form->field($model, 'adress_official_ua') ?>

    <?php // echo $form->field($model, 'adress_official_en') ?>

    <?php // echo $form->field($model, 'adress_post_ua') ?>

    <?php // echo $form->field($model, 'adress_post_en') ?>

    <?php // echo $form->field($model, 'r_s') ?>

    <?php // echo $form->field($model, 'k_s') ?>

    <?php // echo $form->field($model, 'bic') ?>

    <?php // echo $form->field($model, 'swift') ?>

    <?php // echo $form->field($model, 'account_type') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'contractor_id') ?>

    <?php // echo $form->field($model, 'by_default') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
