<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model_contr app\models\Contractor */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="row">
        <div class="col-md-12">

            <!-- START TABS -->
            <div class="panel panel-default tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#tab-first" role="tab" data-toggle="tab" aria-expanded="true">Контрагент</a>

                    </li>
                    <li class=""><a href="#tab-second" role="tab" data-toggle="tab" aria-expanded="false">Банк</a>
                    </li>
                    <li class=""><a href="#tab-third" role="tab" data-toggle="tab" aria-expanded="false">Печать</a></li>


                </ul>
                <div class="panel-body tab-content">
                    <div class="tab-pane active" id="tab-first">

                        <div class="contractor-form">

                            <div class="row">
                                <div class="col-md-12">

                                    <?php yii\widgets\Pjax::begin(['id' => 'pjax_add_contractor']) ?>
                                    <?php $form = ActiveForm::begin([
                                        'id' => 'contractor-form',
                                        //  'enableAjaxValidation' => true,
                                        // 'validationUrl' => Url::toRoute(['/products/validate']),

                                    ]); ?>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-success" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"><span
                                                        aria-hidden="true">×</span><span class="sr-only">Close</span>
                                                </button>
                                                <strong>Контрагент</strong>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-10 col-xs-12">
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
                                                        aria-hidden="true">×</span><span class="sr-only">Close</span>
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
                                            </div>


                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="alert alert-success" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"><span
                                                        aria-hidden="true">×</span><span class="sr-only">Close</span>
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

                                    <div class="form-group">
                                        <div class="col-md-5 col-xs-10">
                                            <?= Html::submitButton($model_contr->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model_contr->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                        </div>
                                    </div>
                                    <?php ActiveForm::end(); ?>
                                    <?php yii\widgets\Pjax::end() ?>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="tab-pane" id="tab-second">
                        <p>Donec tristique eu sem et aliquam. Proin sodales elementum urna et euismod. Quisque nisl
                            nisl,
                            venenatis eget dignissim et, adipiscing eu tellus. Sed nulla massa, luctus id orci sed,
                            elementum consequat est. Proin dictum odio quis diam gravida facilisis. Sed pharetra dolor a
                            tempor tristique. Sed semper sed urna ac dignissim. Aenean fermentum leo at posuere mattis.
                            Etiam vitae quam in magna viverra dictum. Curabitur feugiat ligula in dui luctus, sed
                            aliquet
                            neque posuere.</p>
                    </div>
                    <div class="tab-pane" id="tab-third">
                        <p>Vestibulum cursus augue sed leo tempor, at aliquam orci dictum. Sed mattis metus id velit
                            aliquet, et interdum nulla porta. Etiam euismod pellentesque purus, in fermentum eros
                            venenatis
                            ut. Praesent vitae nibh ac augue gravida lacinia non a ipsum. Aenean vestibulum eu turpis eu
                            posuere. Sed eget lacus lacinia, mollis urna et, interdum dui. Donec sed diam ut metus
                            imperdiet
                            malesuada. Maecenas tincidunt ultricies ipsum, lobortis pretium dolor sodales ut. Donec nec
                            fringilla nulla. In mattis sapien lorem, nec tincidunt elit scelerisque tempus.</p>
                    </div>

                </div>
            </div>
            <!-- END TABS -->
        </div>


    </div>

<?= \lavrentiev\widgets\toastr\NotificationFlash::widget([
    'options' => [
        "closeButton" => false,
        "debug" => false,
        "newestOnTop" => false,
        "progressBar" => false,
        "positionClass" => "toast-top-right",
        "preventDuplicates" => false,
        "onclick" => null,
        "showDuration" => "300",
        "hideDuration" => "1000",
        "timeOut" => "5000",
        "extendedTimeOut" => "1000",
        "showEasing" => "swing",
        "hideEasing" => "linear",
        "showMethod" => "fadeIn",
        "hideMethod" => "fadeOut"
    ]
]) ?>
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
'' ?>