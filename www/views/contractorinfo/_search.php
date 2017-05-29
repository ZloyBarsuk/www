<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContractorInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contractor-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'contr_info_id') ?>

    <?= $form->field($model, 'id_contractor') ?>

    <?= $form->field($model, 'adress_official_ua') ?>

    <?= $form->field($model, 'adress_official_en') ?>

    <?= $form->field($model, 'adress_post_ua') ?>

    <?php // echo $form->field($model, 'adress_post_en') ?>

    <?php // echo $form->field($model, 'director_ua') ?>

    <?php // echo $form->field($model, 'director_en') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'contact_person') ?>

    <?php // echo $form->field($model, 'tax_number') ?>

    <?php // echo $form->field($model, 'vat_reg_no') ?>

    <?php // echo $form->field($model, 'rep') ?>

    <?php // echo $form->field($model, 'customer_number') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
