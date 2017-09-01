<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Po */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="po-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <? $form = ActiveForm::begin([ 'options' => [ 'enctype' => "multipart/form-data", ] ]); ?>

        <?= \yarisrespect\excel\ImportFileWidget::widget([
            'model' => $model, 'form' => $form, 'label' => 'File'
        ])?>
        <?= Html::submitButton('Import') ?>
        <?= \yarisrespect\excel\ImportLogWidget::widget([ 'model' => $model, ])?>

        <? ActiveForm::end(); ?>
    </p>



</div>
