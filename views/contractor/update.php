<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contractor */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Contractor',
]) . $model->contractor_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contractors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->contractor_id, 'url' => ['view', 'id' => $model->contractor_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="contractor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
