<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ContractorInfo */

$this->title = Yii::t('app', 'Create Contractor Info');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contractor Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contractor-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
