<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductsToInvoice */

$this->title = Yii::t('app', 'Create Products To Invoice');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products To Invoices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-to-invoice-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
