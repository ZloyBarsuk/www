<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ContractorInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contractor Infos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contractor-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Contractor Info'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'contr_info_id',
            'id_contractor',
            'adress_official_ua',
            'adress_official_en',
            'adress_post_ua',
            // 'adress_post_en',
            // 'director_ua',
            // 'director_en',
            // 'email:email',
            // 'phone',
            // 'fax',
            // 'contact_person',
            // 'tax_number',
            // 'vat_reg_no',
            // 'rep',
            // 'customer_number',
            // 'created_at',
            // 'created_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
