<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LotNumberSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lot-number-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'inv_id') ?>

    <?= $form->field($model, 'prod_t_inv_id') ?>

    <?= $form->field($model, 'external_lot_number_en') ?>

    <?= $form->field($model, 'external_lot_number_ua') ?>

    <?php // echo $form->field($model, 'alloc_quantity') ?>

    <?php // echo $form->field($model, 'location') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
