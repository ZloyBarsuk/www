<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BankToContractor */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Bank To Contractor',
]) . $model->bank_contr_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bank To Contractors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bank_contr_id, 'url' => ['view', 'id' => $model->bank_contr_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bank-to-contractor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
