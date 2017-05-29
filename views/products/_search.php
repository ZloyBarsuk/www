<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'products_id') ?>

    <?= $form->field($model, 'description_en') ?>

    <?= $form->field($model, 'description_ua') ?>

    <?= $form->field($model, 'part_number') ?>

    <?= $form->field($model, 'country_origin_en') ?>

    <?php // echo $form->field($model, 'country_origin_ua') ?>

    <?php // echo $form->field($model, 'tarif_number_en') ?>

    <?php // echo $form->field($model, 'tarif_number_ua') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'width') ?>

    <?php // echo $form->field($model, 'length') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
