<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ContractorInfo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Contractor Info',
]) . $model->contr_info_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contractor Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->contr_info_id, 'url' => ['view', 'id' => $model->contr_info_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="contractor-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
