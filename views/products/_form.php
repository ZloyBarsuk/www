<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
// добавление
$this->registerJsFile('@web/js/modal_js/products/create.js', ['depends' => [\yii\web\JqueryAsset::className()]]);


?>


<div class="products-form">
    <?php yii\widgets\Pjax::begin(['id' => 'pjax_add_product']) ?>
    <?php $form = ActiveForm::begin([
        'id' => 'products-form',

        //  'options' => ['enctype' => 'multipart/form-data'],
          'enableAjaxValidation' => true,
        //  'validationUrl' => Url::toRoute(['/contractor/ajaxvalidate']),
         'validationUrl' => Url::toRoute(['products/ajax-validate', 'scenario' => $model->scenario, 'model_id' => $model->products_id ]),

    ]); ?>
    <div class="row">
        <div class="col-md-12">


            <?= Html::activeHiddenInput($model, 'products_id') ?>


            <div class="form-group">
                <div class="col-md-10 col-xs-12">
                    <?= $form->field($model, 'description_en')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-10 col-xs-12">
                    <?= $form->field($model, 'description_ua')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-6 col-xs-12">
                    <?= $form->field($model, 'part_number')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-xs-10">
                    <?= $form->field($model, 'country_origin_en')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-xs-10">
                    <?= $form->field($model, 'country_origin_ua')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-xs-10">
                        <?= $form->field($model, 'tarif_number_en')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>

                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-xs-10">
                            <?= $form->field($model, 'tarif_number_ua')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>

                        </div>
                        <div class="form-group">
                            <div class="col-md-3 col-xs-10">
                                <?= $form->field($model, 'weight')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>

                            </div>
                            <div class="form-group">
                                <div class="col-md-3 col-xs-10">
                                    <?= $form->field($model, 'height')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 col-xs-10">
                                        <?= $form->field($model, 'width')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3 col-xs-10">
                                            <?= $form->field($model, 'length')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>

                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3 col-xs-10">
                                                <?= $form->field($model, 'price')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>

                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3 col-xs-10">
                                                    <?= $form->field($model, 'active')->dropDownList(['y' => 'да', 'n' => 'нет',], ['prompt' => 'актуальность товара']) ?>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-xs-10">
                                                        <?= $form->field($model, 'created_at')->textInput()->hiddenInput()->label(false) ?>

                                                    </div>

                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                            </div>

                                            <?php ActiveForm::end(); ?>
                                            <?php yii\widgets\Pjax::end() ?>

                                        </div>
                                    </div>
