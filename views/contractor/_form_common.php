<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\tabs\TabsX;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Contractor */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="contractor-form">

    <?php
    echo TabsX::widget([

        'position' => TabsX::POS_ABOVE,
        'align' => TabsX::ALIGN_LEFT,

        'items' => [
            [
                'label' => 'Контрагент',
                /*'content' =>  $this->render('_form', [
                    'model' => $model,*/
                'content' => '',
                // 'searchModel' => $searchModel,
                // 'dataProvider' => $dataProvider,
                'linkOptions' => ['data-url' => Url::to(['contractor/create'])],


                'active' => true,
                //  'linkOptions'=>['data-url'=>Url::to(['/site/fetch-tab?tab=1'])]
            ],
            [
                'label' => 'Рекцизиты',
                // 'content' => '',
                'headerOptions' => ['style' => 'font-weight:bold'],
                'options' => ['id' => 'myveryownID'],
                'linkOptions' => ['data-url' => Url::to(['contractor/create'])]
            ],
            [
                'label' => 'Платежные данные',
                'items' => [
                    [
                        'label' => 'Банки',
                        'content' => 'DropdownA, Anim pariatur cliche...',
                    ],

                ],
            ],
            [
                'label' => 'Прочее...',
                'items' => [

                    [
                        'label' => 'Печать',
                        'content' => 'DropdownB, Anim pariatur cliche...',
                    ],
                ],
            ],
        ],
    ]);
    ?>
</div>

<?php
$this->registerJsFile(
    '@web/js/modal_js/modal_products.js',
    [ 'depends' => [\yii\web\JqueryAsset::className()],

    ]
);
?>