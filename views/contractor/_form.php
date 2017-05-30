<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Contractor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contractor-form">
    <?php yii\widgets\Pjax::begin(['id' => 'pjax_add_contractor']) ?>
    <?php $form = ActiveForm::begin([
        'id' => 'contractor-form',
        //  'enableAjaxValidation' => true,
        // 'validationUrl' => Url::toRoute(['/products/validate']),

    ]); ?>
    <?= $form->field($model, 'name_ua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'signature')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'contractor_type')->dropDownList([ 'client' => 'Client', 'owner' => 'Owner', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php yii\widgets\Pjax::end() ?>

</div>


<?php
$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        1 => [
            'title' => 'Step 1',
            'icon' => 'glyphicon glyphicon-cloud-download',
           // 'content' => '<h3>Step 1</h3>This is step 1',

            'content' =>$this->render('/products/_form', [
                'model' =>$model_prod,
            ]),

    'buttons' => [
                'next' => [
                    'title' => 'Forward',
                    'options' => [
                        'class' => 'disabled'
                    ],
                ],
            ],
        ],
        2 => [
            'title' => 'Step 2',
            'icon' => 'glyphicon glyphicon-cloud-upload',
            'content' => '<h3>Step 2</h3>This is step 2',
            'skippable' => true,
        ],
        3 => [
            'title' => 'Step 3',
            'icon' => 'glyphicon glyphicon-transfer',
            'content' => '<h3>Step 3</h3>This is step 3',
        ],
    ],
    'complete_content' => "You are done!", // Optional final screen
    'start_step' => 1, // Optional, start with a specific step
];
?>
<?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>