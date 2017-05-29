<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DogovorNumeration */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Dogovor Numeration',
]) . $model->dog_num_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dogovor Numerations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dog_num_id, 'url' => ['view', 'id' => $model->dog_num_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="dogovor-numeration-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
