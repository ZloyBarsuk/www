<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LotNumber */

$this->title = Yii::t('app', 'Create Lot Number');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lot Numbers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lot-number-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
