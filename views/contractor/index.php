<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ContractorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contractors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contractor-index">

    <h1></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <!--  <p>
        <?php /* Html::a(Yii::t('app', 'Create Contractor'), ['create'], ['class' => 'btn btn-success']) ; */?>
    </p>-->

    <p>
        <?= Html::button(Yii::t('app', 'Create Contractor'),  ['value'=>Url::to('/contractor/create'),'class' => 'btn btn-success','id'=>'modalButtonFromModal']) ?>

    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'contractor_id',
            'name_ua',
            'name_en',
            'signature',
            'filename',
            // 'created_at',
            // 'created_by',
            // 'contractor_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
<?php
Modal::begin([
    'header' => '<h4>' . Yii::t('app', '') . '</h4>',
    'id' => 'modal-contractor',
    'size' => 'modal-lg',
    'toggleButton' => false,

    'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],


]);

echo "<div id='modalContent'> </div>";
Modal::end();
?>
<?php
Modal::begin([
    'header' => '<h4>' . Yii::t('app', '') . '</h4>',
    'id' => 'modal-test',
    'size' => 'modal-sm',
    'toggleButton' => false,

    'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],


]);

echo "<div id='modalContent2'> </div>";
Modal::end();
?>
<?php

$this->registerJsFile(
    '@web/js/modal_js/modal_contractor.js',
    [ 'depends' => [\yii\web\JqueryAsset::className()],

    ]
);

?>
<?php

$this->registerJsFile(
    '@web/js/modal_js/modal_test.js',
    [ 'depends' => [\yii\web\JqueryAsset::className()],

    ]
);

?>