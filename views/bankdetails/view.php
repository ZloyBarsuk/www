<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BankDetails */

$this->title = $model->bank_det_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bank Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->bank_det_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->bank_det_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'bank_det_id',
            'id_bank',
            'inn',
            'kpp',
            'ogrm',
            'adress_official_ua',
            'adress_official_en',
            'adress_post_ua',
            'adress_post_en',
            'r_s',
            'k_s',
            'bic',
            'swift',
            'account_type',
            'created_by',
            'created_at',
        ],
    ]) ?>

</div>
