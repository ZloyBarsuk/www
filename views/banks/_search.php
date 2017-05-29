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

    <?= $form->field($model, 'adress_official_ua') ?>

    <?= $form->field($model, 'adress_official_en') ?>

    <?php // echo $form->field($model, 'adress_post_ua') ?>

    <?php // echo $form->field($model, 'adress_post_en') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
