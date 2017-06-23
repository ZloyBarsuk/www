<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model_contr app\models\Contractor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-12">

        <!-- START TABS -->
        <div id="tabs">
            <ul class="nav nav-tabs nav-tabs-arrowed" role="tablist">
                <li class="active"><a href="#contractor" role="tab" data-toggle="tab"
                                      aria-expanded="true">Контрагент</a>
                </li>
                <li class=""><a class="jsloader" href="#baks" role="tab" data-toggle="tab"
                                aria-expanded="false">Банк</a>
                </li>
                <li class=""><a class="jsloader" href="#stamps" role="tab" data-toggle="tab" aria-expanded="false">Печать</a>
                </li>

            </ul>
            <div class="panel-body tab-content">
                <div class="tab-pane active" id="contractor">

                    <div class="contractor">

                        <div class="row">
                            <div class="col-md-12">

                                <?php yii\widgets\Pjax::begin(['id' => 'pjax_add_contractor']) ?>
                                <?php $form = ActiveForm::begin([
                                    'id' => 'contractor-form',
                                    'options' => ['enctype' => 'multipart/form-data'], // important
                                    'enableAjaxValidation' => true,
                                    //  'validationUrl' => Url::toRoute(['/contractor/ajaxvalidate']),
                                    'validationUrl' => Url::toRoute(['contractor/ajax-validate', 'scenario' => $model_contr->scenario, 'model_id' => $model_contr->contractor_id]),

                                ]); ?>


                                <div class="row">
                                    <div class="col-md-12">


                                        <?= Html::activeHiddenInput($model_contr, 'contractor_id') ?>


                                        <div class="form-group">
                                            <div class="col-md-10 col-xs-12">
                                                <?= Html::activeHiddenInput($model_contr, 'signature', ['value' => $model_contr->signature]) ?>
                                                <?= $form->field($model_contr, 'name_en')->textInput(['maxlength' => true]) ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-10 col-xs-12">
                                                <?= $form->field($model_contr, 'name_ua')->textInput(['maxlength' => true]) ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">
                                                <?= $form->field($model_contr, 'contractor_type')->dropDownList(['client' => Yii::t('app', 'Client'), 'owner' => Yii::t('app', 'Owner'),], ['prompt' => 'выбери тип контрагента']) ?>
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
                                            <strong>Реквизиты контрагента</strong>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-md-10 col-xs-12">
                                                <?= $form->field($model_contr_info, 'id_contractor')->hiddenInput()->label(false) ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">
                                                <?= $form->field($model_contr_info, 'adress_official_en')->textInput(['maxlength' => true]) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">
                                                <?= $form->field($model_contr_info, 'adress_official_ua')->textInput(['maxlength' => true]) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">
                                                <?= $form->field($model_contr_info, 'adress_post_en')->textInput(['maxlength' => true]) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">
                                                <?= $form->field($model_contr_info, 'director_en')->textInput(['maxlength' => true]) ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">
                                                <?= $form->field($model_contr_info, 'adress_post_ua')->textInput(['maxlength' => true]) ?>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">
                                                <?= $form->field($model_contr_info, 'director_ua')->textInput(['maxlength' => true]) ?>

                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">
                                                <?= $form->field($model_contr_info, 'contact_person')->textInput(['maxlength' => true]) ?>

                                            </div>
                                            <?= Html::activeHiddenInput($model_contr_info, 'created_at') ?>

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
                                            <strong>Прочее</strong>
                                        </div>


                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <div class="col-md-6 col-xs-10">
                                                    <?= $form->field($model_contr_info, 'email')->textInput(['maxlength' => true]) ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-xs-10">
                                                    <?= $form->field($model_contr_info, 'phone')->textInput(['maxlength' => true]) ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-xs-10">
                                                    <?= $form->field($model_contr_info, 'fax')->textInput(['maxlength' => true]) ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-xs-10">
                                                    <?= $form->field($model_contr_info, 'tax_number')->textInput(['maxlength' => true]) ?>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="col-md-6 col-xs-10">
                                                    <?= $form->field($model_contr_info, 'vat_reg_no')->textInput(['maxlength' => true]) ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-xs-10">
                                                    <?= $form->field($model_contr_info, 'rep')->textInput(['maxlength' => true]) ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-xs-10">
                                                    <?= $form->field($model_contr_info, 'customer_number')->textInput(['maxlength' => true]) ?>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-8 col-xs-10">
                                            <?php /* $form->field($model_contr, 'image')->widget(FileInput::classname(), [
                                                    'options' => ['accept' => 'image/*'],
                                                    'pluginOptions' => ['allowedFileExtensions' => ['jpg', 'gif', 'png'], 'showUpload' => false,'maxFileSize'=>10000000],
                                                ]); */ ?>

                                            <?php
                                            echo $form->field($model_media, 'imageFile')->widget(FileInput::classname(), [
                                                'options' => ['accept' => 'image/*'],
                                                // 'resizeImages'=>true,
                                                'pluginOptions' => [

                                                    'previewFileType' => 'any',
                                                    'initialPreview' => [
                                                        '<img  style="height:inherit;width:inherit;" src="/uploads/signatures/' . $model_contr->signature . '" class="file-preview-image">',
                                                    ],
                                                    'uploadUrl' => Url::to(['/media/upload']),
                                                    'allowedFileExtensions' => ['jpg', 'gif', 'png'],
                                                    'showUpload' => true,
                                                    'maxFileSize' => 10000000,
                                                    'overwriteInitial' => true,
                                                ],


                                                'pluginEvents' => [
                                                    "fileuploaded" => "function(event, data, previewId, index) { $('#contractor-signature').val(data.filenames[0]); }",


                                                ]

                                            ]);
                                            ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-md-3 col-xs-5">
                                                    <?= Html::submitButton($model_contr->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model_contr->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
                                <?php yii\widgets\Pjax::end() ?>
                            </div>
                        </div>


                    </div>

                </div>


                <div class="tab-pane" id="baks">

                    <div id="banks-body">


                    </div>

                </div>


                <div class="tab-pane" id="stamps">
                    <p>

                        <!-- рабочий вариант блядь --><? /*=

                        $this->render('/media/media_upload_form', [
                            'model' => $model_media,
                        ]);

                        */ ?>
                    </p>
                </div>

            </div>
        </div>
        <!-- END TABS -->
    </div>


</div>


<?php
/*$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        1 => [
            'title' => 'Контрагент',
            'icon' => 'glyphicon glyphicon-user',


            'content' =>$this->render('/products/_form', [
                'model' =>$model_contr_prod,
            ]),

    'buttons' => [
                'next' => [
                    'title' => 'Далее',
                    'options' => [
                        'class' => 'disabled'
                    ],
                ],
            ],
        ],
        2 => [
            'title' => 'Реквизиты контрагента',
            'icon' => 'glyphicon glyphicon-file',
            'content' => '<h3>Step 2</h3>This is step 2',
            'skippable' => true,
        ],
        3 => [
            'title' => 'Банки',
            'icon' => 'glyphicon glyphicon-piggy-bank',
            'content' => '<h3>Step 3</h3>This is step 3',
        ],
        3 => [
            'title' => 'Платежные данные банка',
            'icon' => 'glyphicon glyphicon-euro',
            'content' => '<h3>Step 3</h3>This is step 3',
        ],
    ],
    'complete_content' => "Форма заполнена! Сохраните  записи!",
    'start_step' => 1,
];*/
?>
<?= /* \drsdre\wizardwidget\WizardWidget::widget($wizard_config); */
''; ?>
