<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Banks */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$this->registerJsFile('/js/modal_js/add_banks.js', ['position' => $this::POS_END]);

// $this->registerJsFile(Yii::$app->request->BaseUrl . '/js/custom.js', ['position' => $this::POS_END]);
?>


<div class="row">
    <div class="col-md-12">
        <div class="banks-form">

            <?php $form = ActiveForm::begin([
                'id' => 'bank-select-form',
                  'options' => ['enctype' => 'multipart/form-data'], // important
                //   'enableAjaxValidation' => true,
                //  'validationUrl' => Url::toRoute(['/contractor/ajaxvalidate']),
                //  'validationUrl' => Url::toRoute(['banks/ajax-validate', 'scenario' => $model_contr->scenario, 'model_id' => $model_contr->contractor_id]),
                //  'validationUrl' => Url::toRoute(['banks/ajax-validate']),

            ]); ?>
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <?= $form->field($banks_model, 'bank_id')->widget(Select2::classname(), [
                            'data' => $data_list,


                            'language' => 'ru',
                            'options' => ['placeholder' => 'Выбери банк...'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'multiple' => true,
                            ],
                            'pluginEvents' => [
                                "change" => 'function() { 
                                 var selected_banks = $(this).val();
                                
                               
                                                        }',
                            ],
                        ])->label(''); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <?= Html::submitButton($banks_model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['id' => 'add_bank_from_list', 'class' => $banks_model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>


        </div>
    </div>
</div>