<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use sadovojav\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\datecontrol\DateControl;
use app\models\Contractor;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\DocumentTemplate */
/* @var $form yii\widgets\ActiveForm */
?>
<?php

$this->registerJsFile('@web/js/modal_js/templates/create.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

?>

<div class="row">
    <div class="col-md-12">


        <div class="form-group">
            <div class="col-md-10 col-xs-12">
                <?php yii\widgets\Pjax::begin(['id' => 'pjax_add_template']) ?>
                <?php $form = ActiveForm::begin([
                    'id' => 'template-form',
                    // 'options' => ['enctype' => 'multipart/form-data'], // important
                    'enableAjaxValidation' => true,
                    //  'validationUrl' => Url::toRoute(['/contractor/ajaxvalidate']),
                    'validationUrl' => Url::toRoute(['documenttemplate/ajax-validate', 'scenario' => $model_template->scenario, 'model_id' => $model_template->doc_templ_id ]),

                ]); ?>

                <?= $form->field($model_template, 'name')->textInput(['maxlength' => true, 'class' => 'form-control input-sm']) ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-xs-6">
                <?= $form->field($model_template, 'contractor_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Contractor::find()->all(), 'contractor_id', 'name_ua'),
                    'value' => $model_template->contractor_id,
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
            <div class="col-md-4 col-xs-4">

                <?= $form->field($model_template, 'document_type')->dropDownList(['dogovor' => Yii::t('app', 'Dogovor'), 'invoice' => Yii::t('app', 'Invoice'),], ['prompt' => Yii::t('app', 'Choose template')], ['class' => 'form-control input-sm']) ?>

            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3 col-xs-3">

                <?=
                $form->field($model_template, 'date')->widget(DateControl::classname(), [
                    'type' => DateControl::FORMAT_DATE,
                    'ajaxConversion' => false,
                ]);
                ?>
            </div>
        </div>







    </div>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12 col-xs-12">

                <?=
                $form->field($model_template, 'html_template')->widget(CKEditor::className())->label('HTML шаблон');
                ?>
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-3 col-xs-3">


                <?= Html::submitButton($model_template->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model_template->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>


                <?php ActiveForm::end(); ?>
                <?php yii\widgets\Pjax::end() ?>
            </div>
        </div>


    </div>

</div>