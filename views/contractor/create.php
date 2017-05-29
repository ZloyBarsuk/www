<?php

use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Contractor */

$this->title = Yii::t('app', 'Create Contractor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contractors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contractor-create">

    <h1><?php /* echo  Html::encode($this->title) ; */?></h1>

    <?php /* echo  $this->render('_form_common', [
        'model_Contractor' => $model_Contractor,
    ]) ; */?>
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
                 //   'linkOptions' => ['data-url' => Url::to(['contractor/create'])],


                    'active' => true,
                    //  'linkOptions'=>['data-url'=>Url::to(['/site/fetch-tab?tab=1'])]
                ],
                [
                    'label' => 'Рекцизиты',
                    // 'content' => '',
                    'headerOptions' => ['style' => 'font-weight:bold'],
                    'options' => ['id' => 'myveryownID'],
                    'linkOptions' => ['data-url' => Url::to(['contractor/tabs'])]
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
</div>

