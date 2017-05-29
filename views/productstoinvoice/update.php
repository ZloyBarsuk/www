<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsToInvoice */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Products To Invoice',
]) . $model->pr_to_inv_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products To Invoices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pr_to_inv_id, 'url' => ['view', 'id' => $model->pr_to_inv_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="products-to-invoice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
