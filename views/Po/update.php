<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Po */

$this->title = 'Update Po: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="po-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsPoItem' => $modelsPoItem,
    ]) ?>

</div>
