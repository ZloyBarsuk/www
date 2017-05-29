<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ContractorInfo */

$this->title = $model->contr_info_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contractor Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contractor-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->contr_info_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->contr_info_id], [
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
            'contr_info_id',
            'id_contractor',
            'adress_official_ua',
            'adress_official_en',
            'adress_post_ua',
            'adress_post_en',
            'director_ua',
            'director_en',
            'email:email',
            'phone',
            'fax',
            'contact_person',
            'tax_number',
            'vat_reg_no',
            'rep',
            'customer_number',
            'created_at',
            'created_by',
        ],
    ]) ?>

</div>
