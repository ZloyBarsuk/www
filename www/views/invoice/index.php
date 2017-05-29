<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InvoiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Invoices');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Invoice'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'invoice_id',
            'contractor_id',
            'executor_id',
            'number',
            'order_number',
            // 'purchase_order',
            // 'warehouse_name',
            // 'h_s_code',
            // 'comment',
            // 'net_weight',
            // 'gross_weight',
            // 'doc_template_id',
            // 'paletts_info',
            // 'payment_item',
            // 'shipment',
            // 'delivery_terms',
            // 'total_pcs',
            // 'total_summ',
            // 'freight',
            // 'document_date',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'dogovor_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
