<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DogovorNumeration */

$this->title = $model->dog_num_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dogovor Numerations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dogovor-numeration-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->dog_num_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->dog_num_id], [
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
            'dog_num_id',
            'number',
            'executor_id',
            'date',
        ],
    ]) ?>

</div>
