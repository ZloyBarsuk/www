<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DogovorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Dogovors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dogovor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Dogovor'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dogovor_id',
            'id_executor',
            'doc_template_id',
            'id_contractor',
            'id_bank_contractor',
            // 'id_bank_executor',
            // 'id_author',
            // 'dogovor_number',
            // 'delivery_date',
            // 'comments:ntext',
            // 'total_summ',
            // 'created_date',
            // 'closed_date',
            // 'updated_date',
            // 'status',
            // 'folder_path:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
