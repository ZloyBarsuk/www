<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BanksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Banks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banks-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Banks'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bank_id',
            'name_ua',
            'name_en',
            'inn',
            'kpp',
            // 'ogrm',
            // 'adress_official_ua',
            // 'adress_official_en',
            // 'adress_post_ua',
            // 'adress_post_en',
            // 'r_s',
            // 'k_s',
            // 'bic',
            // 'swift',
            // 'account_type',
            // 'created_at',
            // 'created_by',
            // 'contractor_id',
            // 'by_default',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
