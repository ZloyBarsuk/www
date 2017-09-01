<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use kartik\dialog\Dialog;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pos';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="po-index">

    <h1><?/*= Html::encode($this->title) */?></h1>
    <?php /*// echo $this->render('_search', ['model' => $searchModel]); */?>

    <p>
        <?/*= Html::a('Create Po', ['create'], ['class' => 'btn btn-success']) */?>
    </p>
    <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'po_no',
            'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>
</div>-->
<div class="po-index">
<?php
Modal::begin([
    'toggleButton' => [
        'label' => '<i class="glyphicon glyphicon-plus"></i> Add',
        'class' => 'btn btn-success'
    ],
    'closeButton' => [
        'label' => 'Close',
        'class' => 'btn btn-danger btn-sm pull-right',
    ],
    'size' => 'modal-lg',
]);

echo 'Надо взять на вооружение.';

Modal::end();

?>
</div>
