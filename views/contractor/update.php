<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contractor */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Contractor',
]) . $model_contr->contractor_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contractors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model_contr->contractor_id, 'url' => ['view', 'id' => $model_contr->contractor_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="contractor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('crate_form', [
        'model_contr' => $model_contr,
        'model_contr_info' => $model_contr_info,
        'model_media' => $model_media,
    ]) ?>

</div>
