<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use wbraganca\dynamicform\DynamicFormWidget;

?>


<?php


$this->registerCssFile("@web/css/ketek.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],

]);
 $this->registerJsFile('@web/js/modal_js/invoice/dynamic_form_invoice.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$js = '

';

$this->registerJs($js);
?>




<?php yii\widgets\Pjax::begin(['id' => 'pjax_add_invoice']) ?>
<?php $form = ActiveForm::begin([
    'id' => 'invoice-form',
    'options' => ['enctype' => 'multipart/form-data'], // important
    'enableAjaxValidation' => true,
    // 'validationUrl' => Url::toRoute(['invoice/ajax-validate', 'scenario' => $modelInvoice->scenario, 'model_id' => $modelInvoice->invoice_id]),
]); ?>


    <div class="company-name"></div>
<?= Html::activeHiddenInput($modelInvoice, 'invoice_id') ?>

    <hr>

    <table align="center" cellpadding="0" cellspacing="0" class="bill-info">

        <tbody>
        <tr>
            <td>
                <div class="company-name">COMMERCIAL INVOICE for Contract №


                </div>
            </td>
            <td>
                <?=
                $form->field($modelInvoice, 'dogovor_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\app\models\Dogovor::find()->where(['dogovor_id' => $modelInvoice->dogovor_id])->all(),
                        'dogovor_id', 'dogovor_number'),
                    'options' => [
                        'placeholder' => 'Выбери номер договора, блядь',

                    ],

                    'size' => Select2::SMALL,
                    'pluginOptions' => [
                        'width' => '80%',
                        'font-size' => '12px',
                        'allowClear' => true
                    ],
                ])->label('');
                ?>
            </td>
        </tr>
        </tbody>
    </table>


    <table align="center" cellpadding="0" cellspacing="0" class="bill-info">

        <tbody>
        <tr>
            <td class="bill-info-col">Bill To:</td>
            <td>

                <?=
                $form->field($modelInvoice, 'executor_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\app\models\Contractor::find()->where(['contractor_type' => 'owner'])->all(),
                        'contractor_id', 'name_ua'),
                    'options' => [
                        'placeholder' => 'Выбери получателя груза',

                    ],

                    'size' => Select2::SMALL,
                    'pluginOptions' => [
                        'width' => '50%',
                        'font-size' => '12px',
                        'allowClear' => true
                    ],
                ])->label('');
                ?>


            </td>
            <td class="bill-info-col"> Invoice No:</td>
            <td>  <?= $form->field($modelInvoice, 'number')->textInput(['maxlength' => true,
                    'style' => ['width' => '50%', 'height' => '20px', 'font-size' => '12px']])->label(''); ?></td>
        </tr>
        <tr>
            <td class="bill-info-col"> Ship To:</td>
            <td>
                <?=
                $form->field($modelInvoice, 'executor_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\app\models\Contractor::find()
                        ->all(), 'contractor_id', 'name_ua'),
                    'options' => [
                        'id' => 'ship',
                        'placeholder' => 'Выбери получателя груза',

                    ],

                    'size' => Select2::SMALL,
                    'pluginOptions' => [
                        'width' => '50%',

                        'allowClear' => true
                    ],
                ])->label('');
                ?>
            </td>
            <td class="bill-info-col"> Order No:</td>
            <td> <?= $form->field($modelInvoice, 'order_number')->textInput(['maxlength' => true,
                    'style' => ['width' => '50%', 'height' => '20px', 'font-size' => '12px']])->label(''); ?></td>
        </tr>
        <tr>
            <td class="bill-info-col">Address:</td>
            <td>

                <?php

                echo $adress = \app\models\ContractorInfo::find()->where(['id_contractor' => $modelInvoice->executor_id])->one()->adress_official_en;

                ?>
            </td>
            <td class="bill-info-col"> Payment Item:</td>

            <td> <?= $form->field($modelInvoice, 'payment_item')->textInput(['maxlength' => true, 'value' => 'CPT Kyiv Ukraine',
                    'style' => ['width' => '50%', 'height' => '20px', 'font-size' => '12px']])->label(''); ?></td>


        </tr>
        <tr>
            <td class="bill-info-col">Tel:</td>
            <td> +380445373257</td>
            <td class="bill-info-col"> Shipment:</td>
            <td>
                <?= $form->field($modelInvoice, 'shipment')->textInput(['maxlength' => true,
                    'style' => ['width' => '50%', 'height' => '20px', 'vertical-align' => 'middle']])->label(''); ?></td>

            </td>
        </tr>
        </tbody>
    </table>
    <table align="center" cellpadding="0" cellspacing="0" class="table-products">
        <tbody>
        <tr>
            <td colspan="2" scope="col" class="product-header-col">Comment</td>
            <td colspan="2" scope="col" class="product-header-col">

                <?= $form->field($modelInvoice, 'comment')->textInput(['maxlength' => true,
                    'value' => !empty($modelInvoice->comment) ? $modelInvoice->comment : 'CPT Kyiv Ukraine VAT Paid',

                    'style' => ['width' => '100%', 'height' => '20px', 'font-size' => '12px']])->label(''); ?>
            </td>
            <td colspan="4" scope="col" class="product-header-col">

                <?= $form->field($modelInvoice, 'h_s_code')->textInput(['maxlength' => true,
                    'value' => !empty($modelInvoice->h_s_code) ? $modelInvoice->h_s_code : 'H.S.CODE:8207300090 punch press tooling',
                    'style' => ['width' => '100%', 'height' => '20px', 'font-size' => '12px']])->label(''); ?>

            </td>
        </tr>
        <tr class="product-header-subrow" id="subrow">
            <td class="item-position">&nbsp;</td>
            <td class="part-code">Part code</td>
            <td colspan="2" class="description">Description (mm)</td>
            <td class="amount">Amount</td>
            <td class="unit">Unit/$</td>
            <td class="total">Total/$</td>
            <td class="remark">Remark</td>
        </tr>


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


        <!--
                <tr class="product-item-row">
                    <td class="item-position-row">22</td>
                    <td class="part-code-row">HT.BP2SQ.</td>
                    <td class="description-row" colspan="2">B STN Thk Turret 85 Punch SQ 10/10</td>
                    <td class="amount-row">1</td>
                    <td class="unit-row">34.9</td>
                    <td class="total-row">34.9</td>
                    <td class="remark-row">0+135DEG</td>
                </tr>


        -->


        <tr class="product-item-row">
            <td class="item-position-row">22</td>
            <td class="part-code-row">HT.BP2SQ.</td>
            <td class="description-row" colspan="2">B STN Thk Turret 85 Punch SQ 10/10</td>
            <td class="amount-row">1</td>
            <td class="unit-row">    <?= $form->field($modelInvoice, 'paletts_info')->textInput(['maxlength' => true,
                    'style' => ['width' => '50%', 'height' => '20px', 'align' => "center", 'margin-left' => 'auto', 'margin-right' => 'auto',]])->label(''); ?>

            </td>
            <td class="total-row">34.9</td>
            <td class="remark-row">0+135DEG</td>
        </tr>
        <tr class="product-item-row">
            <td colspan="8">product-item-row</td>
        </tr>


        <tr class="product-item-row">
            <td>&nbsp;</td>
            <td>Freight</td>
            <td colspan="2" class="description-row">Freight</td>
            <td>1</td>
            <td align="center"><?= $form->field($modelInvoice, 'freight')->textInput(['maxlength' => true,
                    'style' => ['width' => '50%', 'height' => '20px', 'align' => "center", 'margin-left' => 'auto', 'margin-right' => 'auto',]])->label(''); ?>
            </td>
            <td><p><?= $form->field($modelInvoice, 'freight')->textInput(['maxlength' => true,
                        'style' => ['width' => '50%', 'height' => '20px', 'align' => "center", 'margin-left' => 'auto', 'margin-right' => 'auto',]])->label(''); ?>
                </p>
            </td>
            <td><?= $form->field($modelInvoice, 'gross_weight')->textInput(['maxlength' => true,
                    'style' => ['width' => '50%', 'height' => '20px', 'align' => "center", 'margin-left' => 'auto', 'margin-top' => 'auto', 'margin-bottom' => '20px',
                        'margin-right' => 'auto',]])->label(''); ?>
            </td>
        </tr>
        <tr class="product-footer-col">
            <td colspan="3" class="description-row">Country of origin of positions:(China)</td>
            <td width="173" align="center">
                <div align="center">Total pcs:</div>
            </td>
            <td>
                <?= $form->field($modelInvoice, 'total_pcs')->textInput(['maxlength' => true,
                    'style' => ['width' => '50%', 'height' => '20px', 'align' => "center", 'margin-left' => 'auto', 'margin-top' => 'auto', 'margin-bottom' => '20px',
                        'margin-right' => 'auto',]])->label(''); ?>

            </td>
            <td colspan="2">Total Value(US$):</td>
            <td align="center">

                <?= $form->field($modelInvoice, 'total_summ')->textInput(['maxlength' => true,
                    'style' => ['width' => '50%', 'height' => '20px', 'align' => "center", 'margin-left' => 'auto', 'margin-top' => 'auto', 'margin-bottom' => '20px',
                        'margin-right' => 'auto']])->label(''); ?>

            </td>
        </tr>
        <tr class="product-footer-total">
            <td colspan="3" class="description-row">Total Value (after add-ons or discount):</td>
            <td colspan="5">&nbsp;</td>
        </tr>
        <tr class="product-footer-total ">
            <td colspan="3">
                <div align="right">Remark:</div>
            </td>
            <td colspan="5">
                <div align="left">paid off taxes</div>
            </td>
        </tr>
        </tbody>
    </table>

    <p></p>
    <table class="company-info" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td colspan="3">Declaration Statement:I hereby certify the the information on this invocoe is true and
                correct
                and the contents and value of this
            </td>
        </tr>
        <tr>
            <td> shipments is as stated above.</td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
    <hr>
    <table class="company-info" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td colspan="3">These commodities,technology of software were exported from China in accordance with the
                Export
                Administratioin Regulations.
            </td>
        </tr>
        <tr>
            <td> Diversion contrary to Chinese law prohibited.</td>
            <td></td>
            <td> Date:</td>
        </tr>
        </tbody>
    </table>


    <div class="form-group">
        <?= Html::submitButton($modelInvoice->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>


<?php ActiveForm::end(); ?>
<?php yii\widgets\Pjax::end() ?>