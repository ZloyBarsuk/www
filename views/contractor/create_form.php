<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model_contr app\models\Contractor */
/* @var $form yii\widgets\ActiveForm */
?>
<?php

$this->registerJsFile('@web/js/modal_js/contractor/create.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->registerJsFile('@web/js/modal_js/banks/create.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

?>
 <div class="row">
    <div class="col-md-12">

        <!-- START TABS -->
        <div id="tabs">


            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#contractor" role="tab" data-toggle="tab">Контрагент</a></li>
                <!-- <li><a href="#javatab" role="tab" data-toggle="tab" class="ajax_loader">Java</a></li>
                 <li><a href="#csharptab" role="tab" data-toggle="tab" class="ajax_loader">C#</a></li>
                 <li><a href="#mysqltab" role="tab" data-toggle="tab" class="ajax_loader">MySQL</a></li>-->

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Банковские реквизиты <b
                                class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!-- <li><a href="#banks_create-from-list" role="tab" data-toggle="tab" class="ajax_loader">Выбрать из
                                 списка существующих</a></li>-->
                        <li><a href="#banks_create" role="tab" data-toggle="tab" class="ajax_loader">Записать новый
                                банк</a></li>
                    </ul>
                </li>
                <li><a href="#documenttemplate_create" role="tab" data-toggle="tab" class="ajax_loader">Шаблоны документов</a></li>

            </ul>


            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="contractor">
                    <div class="">

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
                                                <?= $form->field($model_contr, 'name_en')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-10 col-xs-12">
                                                <?= $form->field($model_contr, 'name_ua')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">
                                                <?= $form->field($model_contr, 'contractor_type')->dropDownList(['client' => Yii::t('app', 'Client'), 'owner' => Yii::t('app', 'Owner'),], ['prompt' => 'выбери тип контрагента', 'class' => 'form-control input-sm']) ?>
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
                                                <?= $form->field($model_contr_info, 'adress_official_en')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">
                                                <?= $form->field($model_contr_info, 'adress_official_ua')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">
                                                <?= $form->field($model_contr_info, 'adress_post_en')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">
                                                <?= $form->field($model_contr_info, 'director_en')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">
                                                <?= $form->field($model_contr_info, 'adress_post_ua')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">
                                                <?= $form->field($model_contr_info, 'director_ua')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>

                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">
                                                <?= $form->field($model_contr_info, 'contact_person')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>

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
                                                    <?= $form->field($model_contr_info, 'email')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-xs-10">
                                                    <?= $form->field($model_contr_info, 'phone')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-xs-10">
                                                    <?= $form->field($model_contr_info, 'fax')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-xs-10">
                                                    <?= $form->field($model_contr_info, 'tax_number')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="col-md-6 col-xs-10">
                                                    <?= $form->field($model_contr_info, 'vat_reg_no')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-xs-10">
                                                    <?= $form->field($model_contr_info, 'rep')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-xs-10">
                                                    <?= $form->field($model_contr_info, 'customer_number')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
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
                                                    'allowedFileExtensions' => ['jpg', 'gif', 'png', 'gif'],
                                                    'showUpload' => true,
                                                    'maxFileSize' => 10000000,
                                                    'overwriteInitial' => true,
                                                ],


                                                'pluginEvents' => [
                                                    "fileuploaded" => "function(event, data, previewId, index) { $('#contractor-signature').val(data.filenames[0]);}",


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

                                                        <button type="button" class="close" data-dismiss="alert">
                                                            <span
                                                                    aria-hidden="true">×</span>
                                                            <span
                                                                    class="sr-only"><?php Yii::t('app', 'Close'); ?> </span>
                                                        </button>
                                                        <strong>
                                                            <div class="success_notify_content"></div>
                                                        </strong>
                                                    </div>
                                                    <div class="alert alert-danger" role="alert" style="display:none;"
                                                         id="danger_notify">

                                                        <button type="button" class="close" data-dismiss="alert">
                                                            <span aria-hidden="true">×</span>

                                                            <span class="sr-only"><?php Yii::t('app', 'Close'); ?> </span>
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

                <!-- <div class="tab-pane" id="banks_create-from-list">

                 </div>-->
                <div class="tab-pane" id="banks_create">


                </div>
                <div class="tab-pane" id="documenttemplate_create">


                </div>

            </div>
            <!-- END TABS -->
        </div>


    </div>


 </div>
