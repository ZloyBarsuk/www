<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BankToContractor */

$this->title = Yii::t('app', 'Create Bank To Contractor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bank To Contractors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-to-contractor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
