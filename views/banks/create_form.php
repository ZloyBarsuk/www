<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use app\models\Contractor;

/* @var $this yii\web\View */
/* @var $model app\models\Banks */
/* @var $form yii\widgets\ActiveForm */
?>
<?php

$this->registerJsFile('/js/modal_js/banks/create.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

?>

<div class="banks-form">
    <div class="row">
        <div class="col-md-12">
            <?php
          /*  yii\widgets\Pjax::begin([
                    'id' => 'pjax_add_banks',

            ]) */
            ?>
            <?php $form = ActiveForm::begin([

                'method' => 'post',
                'id' => 'banks-form',
                'options' => [
                    //   'enctype' => 'multipart/form-data'
                    'data-pjax' => true,

                ], // important
                  'enableAjaxValidation' => true,
                //  'validationUrl' => Url::toRoute(['/contractor/ajaxvalidate']),
                'validationUrl' => Url::toRoute(['banks/ajax-validate'  /*, 'scenario' => $model_bank->scenario, 'model_id' => $model_bank->contractor_id */]),

            ]); ?>


            <div class="row">
                <div class="col-md-12">


                    <?= Html::activeHiddenInput($model_bank, 'bank_id') ?>
                    <?php /* echo Html::activeHiddenInput($model_bank, 'contractor_id', ['value' => $model_bank->contractor_id]); */ ?>

                    <div class="form-group">
                        <div class="col-md-6 col-xs-6">
                            <?= $form->field($model_bank, 'contractor_id')->widget(Select2::classname(), [
                                //    'data' => ArrayHelper::map(\app\models\Banks::find()->all(), 'bank_id', 'name_en'),
                                'data' => ArrayHelper::map(Contractor::find()->all(), 'contractor_id', 'name_ua'),
                                'value' => $model_bank->contractor_id,
                                'language' => 'ru',
                                'options' => ['placeholder' => 'Выбери контрагента...'],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'multiple' => false,
                                ],
                                'pluginEvents' => [
                                    "change" => '',


                                ],
                            ])->label('Контрагент') ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-10 col-xs-12">
                            <?= $form->field($model_bank, 'name_en')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10 col-xs-12">
                            <?= $form->field($model_bank, 'name_ua')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-xs-10">
                            <?= $form->field($model_bank, 'by_default')->dropDownList(['y' => 'да', 'n' => 'нет',], ['prompt' => 'Использовать по умолчанию в договоре', 'class' => 'form-control input-sm']) ?>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span
                                    aria-hidden="true">×</span><span
                                    class="sr-only">Close</span>
                        </button>
                        <strong>Реквизиты банка</strong>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-xs-10">
                            <?= $form->field($model_bank, 'adress_official_en')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-xs-10">
                            <?= $form->field($model_bank, 'adress_official_ua')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-xs-10">
                            <?= $form->field($model_bank, 'adress_post_en')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-xs-10">
                            <?= $form->field($model_bank, 'adress_post_ua')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 col-xs-10">
                            <?= $form->field($model_bank, 'inn')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 col-xs-10">
                            <?= $form->field($model_bank, 'kpp')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-3 col-xs-10">
                            <?= $form->field($model_bank, 'ogrm')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>

                        </div>

                    </div>


                </div>
            </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span
                                    aria-hidden="true">×</span><span
                                    class="sr-only">Close</span>
                        </button>
                        <strong>Палтежные данные</strong>
                    </div>


                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="col-md-6 col-xs-10">
                                <?= $form->field($model_bank, 'r_s')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-xs-10">
                                <?= $form->field($model_bank, 'k_s')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-xs-10">
                                <?= $form->field($model_bank, 'bic')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-xs-10">
                                <?= $form->field($model_bank, 'swift')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-xs-10">
                                <?= $form->field($model_bank, 'account_type')->dropDownList(['rub' => 'Rub', 'eur' => 'Eur', 'usd' => 'Usd', 'uah' => 'Uah',], ['prompt' => 'Выбор валюты счета', 'class' => 'form-control input-sm']) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 col-xs-10">
                                <?= $form->field($model_bank, 'comments')->textarea(['rows' => 1, 'cols' => 2]); ?>

                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">


                    </div>

                </div>
            </div>


            <div class="row">


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-3 col-xs-5">
                                <?= Html::submitButton($model_bank->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['id' => 'banks_create_button', 'class' => $model_bank->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            </div>
                            <div class="col-md-10">
                                <div class="alert alert-success" role="alert" style="display:none;"
                                     id="success_notify">
                                    <button type="button" class="close" data-dismiss="alert"><span
                                                aria-hidden="true">×</span><span
                                                class="sr-only"><?php Yii::t('app', 'Close'); ?> </span>
                                    </button>
                                    <strong>
                                        <div class="success_notify_content"></div>
                                    </strong>
                                </div>
                                <div class="alert alert-danger" role="alert" style="display:none;"
                                     id="danger_notify">
                                    <button type="button" class="close" data-dismiss="alert"><span
                                                aria-hidden="true">×</span><span
                                                class="sr-only"><?php Yii::t('app', 'Close'); ?> </span>
                                    </button>
                                    <strong>
                                        <div class="danger_notify_content"></div>
                                    </strong>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>


            <?php ActiveForm::end(); ?>
            <?php // yii\widgets\Pjax::end() ?>
        </div>
    </div>