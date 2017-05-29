<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dogovor */

$this->title = $model->dogovor_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dogovors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dogovor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->dogovor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->dogovor_id], [
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
            'dogovor_id',
            'id_executor',
            'doc_template_id',
            'id_contractor',
            'id_bank_contractor',
            'id_bank_executor',
            'id_author',
            'dogovor_number',
            'delivery_date',
            'comments:ntext',
            'total_summ',
            'created_date',
            'closed_date',
            'updated_date',
            'status',
            'folder_path:ntext',
        ],
    ]) ?>

</div>
