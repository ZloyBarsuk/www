<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DocumentTemplate */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Document Template',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Document Templates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->doc_templ_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="document-template-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
