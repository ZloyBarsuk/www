<?php
use yii\helpers\Html;
// use kartik\widgets\ActiveForm;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\widgets\DatePicker;
use yii\helpers\Url;
use kartik\widgets\DepDrop;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Dogovor */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$this->registerJsFile('/js/modal_js/dogovor/create.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>

<div class="row">
    <div class="col-md-12">

        <!-- START TABS -->
        <div id="tabs">


            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#dogovor" role="tab" data-toggle="tab">Договор</a></li>
                <!-- <li><a href="#javatab" role="tab" data-toggle="tab" class="ajax_loader">Java</a></li>
                 <li><a href="#csharptab" role="tab" data-toggle="tab" class="ajax_loader">C#</a></li>
                 <li><a href="#mysqltab" role="tab" data-toggle="tab" class="ajax_loader">MySQL</a></li>-->
                <?php if ($model_dogovor->isNewRecord) { ?>
                    <li><a href="#invoice_create" role="tab" data-toggle="tab" class="ajax_loader">Инвойсы</a></li>
                <?php } else { ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Инвойсы<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#invoice_create" role="tab" data-toggle="tab" class="ajax_loader">Выбрать из
                                    списка существующих</a></li>
                            <li><a href="#invoice_list-by-contractor" role="tab" data-toggle="tab" class="ajax_loader">Создать
                                    новый инвойс</a></li>

                        </ul>
                    </li>
                <?php } ?>
                <li><a href="#products" role="tab" data-toggle="tab">Товарные позиции</a></li>

            </ul>


            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="dogovor">
                    <div class="">

                        <div class="row">
                            <div class="col-md-12">

                                <?php yii\widgets\Pjax::begin(['id' => 'pjax_add_dogovor']) ?>
                                <?php $form = ActiveForm::begin([
                                    'id' => 'dogovor-form',
                                    'options' => ['enctype' => 'multipart/form-data'], // important
                                    'enableAjaxValidation' => true,
                                    'validationUrl' => Url::toRoute(['dogovor/ajax-validate', 'scenario' => $model_dogovor->scenario, 'model_id' => $model_dogovor->dogovor_id]),
                                ]); ?>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"><span
                                                    aria-hidden="true">×</span><span
                                                    class="sr-only">Close</span>
                                            </button>
                                            <strong>Данные договора</strong>
                                        </div>

                                        <?= Html::activeHiddenInput($model_dogovor, 'dogovor_id') ?>


                                        <div class="form-group">
                                            <div class="col-md-2 col-xs-2">
                                                <?= $form->field($model_dogovor, 'dogovor_number')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-2 col-xs-2">
                                                <?= $form->field($model_dogovor, 'status')->dropDownList(['в работе' => 'в работе', 'на подписании' => 'на подписании', 'не заключили' => 'не заключили', 'расторгнут' => 'расторгнут', 'закрыт' => 'закрыт', 'приостановлен' => 'приостановлен', 'не оплачен' => 'не оплачен', 'оплачен' => 'оплачен',], ['prompt' => 'Выбор статуса договора']) ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4 col-xs-4">


                                                <?=
                                                   $form->field($model_dogovor, 'created_date')->widget(DateControl::classname(), [
                                                      'type'=>DateControl::FORMAT_DATE,
                                                      'ajaxConversion'=>false,

                                                  ]);
                                                  ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-4 col-xs-4">

                                                <?= $form->field($model_dogovor, 'closed_date')->widget(DateControl::classname(), [
                                                    'type'=>DateControl::FORMAT_DATE,
                                                    'ajaxConversion'=>false,

                                                ]);?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4 col-xs-4">
                                                <?= $form->field($model_dogovor, 'total_summ')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>

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
                                            <strong>Данные поставщика</strong>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-md-12 col-xs-12">

                                                <?=
                                                $form->field($model_dogovor, 'id_contractor')->widget(Select2::classname(), [
                                                    'data' => ArrayHelper::map(\app\models\Contractor::find()->where(['contractor_type' => 'client'])->all(), 'contractor_id', 'name_ua'),
                                                    'options' => ['placeholder' => 'Select a state ...'],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ]);
                                                ?>


                                                <?php
                                                /* echo $form->field($model_dogovor, 'id_contractor')->widget(DepDrop::classname(), [
                                                      'data' => ArrayHelper::map(\app\models\Contractor::find()->where(['contractor_type' => 'client'])->all(), 'contractor_id', 'name_ua'),
                                                      'options' => [
                                                          'id' => 'id_contractor',
                                                          'placeholder' => 'Выбор банка поставщика ...'
                                                      ],
                                                      'type' => DepDrop::TYPE_SELECT2,
                                                      'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                                                      'pluginOptions' => [
                                                          // 'depends'=>['dogovor-id_executor'],
                                                          'initialize' => true,
                                                          'depends' => [Html::getInputId($model_dogovor, 'id_executor')],
                                                          'url' => Url::to(['/banks/dropdown-by-contractor']),
                                                          'loadingText' => 'Загружаем список банков...',
                                                      ],
                                                      'pluginEvents' => [
                                                          'change' => "function(){ }"
                                                      ],
                                                  ]);*/
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">
                                                <?=
                                                $form->field($model_dogovor, 'id_bank_contractor')->widget(DepDrop::classname(), [
                                                    'data' => [$model_dogovor->id_bank_contractor => ''],
                                                    'options' => ['placeholder' => 'Выбор банка поставщика ...'],
                                                    'type' => DepDrop::TYPE_SELECT2,
                                                    'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                                                    'pluginOptions' => [
                                                        'initialize' => true,
                                                        'initDepends' => [Html::getInputId($model_dogovor, 'id_contractor')],
                                                        //  'depends' => ['dogovor-id_contractor'],
                                                        'depends' => [Html::getInputId($model_dogovor, 'id_contractor')],
                                                        'url' => Url::to(['/banks/dropdown-by-contractor']),
                                                        'loadingText' => 'Загружаем список банков...',
                                                    ],
                                                ]);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">
                                                <?=
                                                $form->field($model_dogovor, 'doc_template_id')->widget(DepDrop::classname(), [
                                                    // 'data' => ArrayHelper::map(\app\models\Contractor::find()->where(['contractor_type' => 'owner'])->all(), 'contractor_id', 'name_ua'),
                                                    'data' => [$model_dogovor->doc_template_id => ''],
                                                    'options' => [
                                                        // 'id' => 'doc_template_id',
                                                        'placeholder' => 'Выбор шаблона документа...',
                                                    ],
                                                    'type' => DepDrop::TYPE_SELECT2,
                                                    'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                                                    'pluginOptions' => [
                                                        'initialize' => true,
                                                        'initDepends' => [Html::getInputId($model_dogovor, 'id_contractor')],

                                                        // 'depends'=>['dogovor-id_executor'],
                                                        // 'depends' => [Html::getInputId($model_dogovor, 'id_contractor')],
                                                        // 'depends' => ['dogovor-id_contractor'],
                                                        'depends' => [Html::getInputId($model_dogovor, 'id_contractor')],

                                                        'url' => Url::to(['/documenttemplate/templates-by-contractor']),
                                                        'loadingText' => 'Загружаем список шаблонов...',
                                                    ],
                                                    'pluginEvents' => [
                                                        'change' => "function(){ }"


                                                    ],
                                                ]);
                                                ?>
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
                                            <strong>Данные покупателя</strong>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">
                                                <?php
                                                /*  echo  $form->field($model_dogovor, 'id_executor')->widget(DepDrop::classname(), [
                                                        'data' => ArrayHelper::map(\app\models\Contractor::find()->where(['contractor_type' => 'owner'])->all(), 'contractor_id', 'name_ua'),
                                                        'options' => [
                                                            'id' => 'id_executor',
                                                            'placeholder' => 'Выбор банка поставщика ...'
                                                        ],
                                                        'type' => DepDrop::TYPE_SELECT2,
                                                        'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                                                        'pluginOptions' => [
                                                            'initialize' => true,
                                                            'depends' => [Html::getInputId($model_dogovor, 'id_executor')],
                                                            'url' => Url::to(['/banks/dropdown-by-contractor']),
                                                            'loadingText' => 'Загружаем список банков...',
                                                        ],
                                                        'pluginEvents' => [
                                                            'change' => "function(){
                                                       //  var wer=$('#dogovor-id_bank_executor option:selected').val();
                                                        // alert(wer);
                                                                                  }"
                                                        ],
                                                    ]);*/
                                                ?>

                                                <?=
                                                $form->field($model_dogovor, 'id_executor')->widget(Select2::classname(), [
                                                    'data' => ArrayHelper::map(\app\models\Contractor::find()->where(['contractor_type' => 'owner'])->all(), 'contractor_id', 'name_ua'),
                                                    'options' => ['placeholder' => 'Select a state ...'],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ]);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">


                                                <?=
                                                $form->field($model_dogovor, 'id_bank_executor')->widget(DepDrop::classname(), [
                                                    'data' => [$model_dogovor->id_bank_executor => 'xxx'],
                                                    'options' => ['placeholder' => 'Выбор банка покупателя ...'],
                                                    'type' => DepDrop::TYPE_SELECT2,
                                                    'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                                                    'pluginOptions' => [
                                                        'initialize' => true,
                                                        // 'depends' => ['id_executor'],
                                                        'initDepends' => [Html::getInputId($model_dogovor, 'id_executor')],

                                                        'depends' => [Html::getInputId($model_dogovor, 'id_executor')],
                                                        'url' => Url::to(['/banks/dropdown-by-contractor']),
                                                        'loadingText' => 'Загружаем список банков...',
                                                    ],
                                                    'pluginEvents' => [
                                                        'change' => "function(){
                                                   //  var wer=$('#dogovor-id_bank_executor option:selected').val();
                                                    // alert(wer);
                                                                              }"
                                                    ],
                                                ]);
                                                ?>


                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-10">


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
                                            <strong>Общее</strong>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-md-4 col-xs-4">

                                                <?= $form->field($model_dogovor, 'delivery_date')->widget(DateControl::classname(), [
                                                    'type'=>DateControl::FORMAT_DATE,
                                                ]);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4 col-xs-4">


                                                <?= $form->field($model_dogovor, 'updated_date')->widget(DateControl::classname(), [
                                                    'type'=>DateControl::FORMAT_DATE,
                                                ]);?>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-4 col-xs-4">
                                                <?= $form->field($model_dogovor, 'comments')->textarea(['rows' => 2, 'class' => 'form-control input-sm']) ?>

                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-md-4 col-xs-4">
                                                <?= $form->field($model_dogovor, 'folder_path')->textarea(['rows' => 2, 'class' => 'form-control input-sm']) ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <div class="col-md-3 col-xs-3">
                                                <?= Html::submitButton($model_dogovor->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model_dogovor->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
                <div class="tab-pane" id="invoice_create">

                    INVOICE

                </div>
                <div class="tab-pane" id="invoice_list-by-contractor">

                    invoice_list-by-contractor

                </div>
                <div class="tab-pane" id="products">

                    PRODUCTS

                </div>
            </div>
            <!-- END TABS -->
        </div>


    </div>


</div>