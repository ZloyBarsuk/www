<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dogovor */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Dogovor',
]) . $model->dogovor_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dogovors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dogovor_id, 'url' => ['view', 'id' => $model->dogovor_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="dogovor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
