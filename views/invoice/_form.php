<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;


/* @var $this yii\web\View */
/* @var $model app\models\Po */
/* @var $form yii\widgets\ActiveForm */

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-items").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-items").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>

    <div class="po-form">

        <?php $form = ActiveForm::begin([
            'id' => 'dynamic-form',
           // 'options' => ['enctype' => 'multipart/form-data'], // important
           // 'enableAjaxValidation' => true,
            // 'validationUrl' => Url::toRoute(['invoice/ajax-validate', 'scenario' => $modelInvoice->scenario, 'model_id' => $modelInvoice->invoice_id]),
        ]); ?>









        <div class="panel-body">
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-product', // css class
                'deleteButton' => '.remove-c', // css class
                'model' => $modelsProductsInvoice[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'item_number',
                    'product_id',
                    'unit',
                    'quantity',
                    'unit_price_manual',
                    'total_price',
                ],
            ]); ?>


            <div class="container-items"><!-- widgetContainer -->
                <?php foreach ($modelsProductsInvoice as $i => $modelProductInvoice): ?>
                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left panel-title-products">Address</h3>
                            <div class="pull-right">
                                <button type="button" class="add-product btn btn-success btn-xs"><i
                                        class="glyphicon glyphicon-plus"></i></button>
                                <button type="button" class="remove-product btn btn-danger btn-xs"><i
                                        class="glyphicon glyphicon-minus"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                            // necessary for update action.
                            if (!$modelProductInvoice->isNewRecord) {
                                echo Html::activeHiddenInput($modelProductInvoice, "[{$i}]pr_to_inv_id");
                            }
                            ?>
                            <?= $form->field($modelProductInvoice, "[{$i}]item_number")->textInput(['maxlength' => true]) ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelProductInvoice, "[{$i}]product_id")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($modelProductInvoice, "[{$i}]unit")->textInput(['maxlength' => true]) ?>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <?= $form->field($modelProductInvoice, "[{$i}]quantity")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($modelProductInvoice, "[{$i}]unit_price_manual")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($modelProductInvoice, "[{$i}]total_price")->textInput(['maxlength' => true]) ?>
                                </div>
                            </div><!-- .row -->
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>













        <div class="form-group">
            <?= Html::submitButton($modelInvoice->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
        </div>


        <?php ActiveForm::end(); ?>












    </div>

