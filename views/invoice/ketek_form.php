<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;


?>

<?php


$this->registerCssFile("@web/css/ketek.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],

]);
?>


<?php yii\widgets\Pjax::begin(['id' => 'pjax_add_invoice']) ?>
<?php $form = ActiveForm::begin([
    'id' => 'invoice-form',
    'options' => ['enctype' => 'multipart/form-data'], // important
    'enableAjaxValidation' => true,
    // 'validationUrl' => Url::toRoute(['invoice/ajax-validate', 'scenario' => $model_invoice->scenario, 'model_id' => $model_invoice->invoice_id]),
]); ?>


    <div class="company-name"></div>
<?= Html::activeHiddenInput($model_invoice, 'invoice_id') ?>

    <hr>
    <div class="inovice-name">COMMERCIAL INVOICE</div>
    <table align="center" cellpadding="0" cellspacing="0" class="bill-info">
        <tbody>
        <tr>
            <td class="bill-info-col">Bill To:</td>
            <td>

                <?=
                $form->field($model_invoice, 'contractor_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\app\models\Contractor::find()->where(['contractor_type' => 'client'])->all(), 'contractor_id', 'name_ua'),
                    'options' => [
                        'placeholder' => 'Select a state ...',

                    ],

                    'size' => Select2::SMALL,
                    'pluginOptions' => [
                        'width'=>'50%',

                        'allowClear' => true
                    ],
                ]);
                ?>


            </td>
            <td class="bill-info-col"> Invoice No:</td>
            <td>  <?= $form->field($model_invoice, 'number')->textInput(['maxlength' => true]) ?></td>
        </tr>
        <tr>
            <td class="bill-info-col"> Ship To:</td>
            <td>
                <?=
                $form->field($model_invoice, 'contractor_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\app\models\Contractor::find()->where(['contractor_type' => 'client'])->all(), 'contractor_id', 'name_ua'),
                    'options' => [
                        'placeholder' => 'Select a state ...',

                    ],

                    'size' => Select2::SMALL,
                    'pluginOptions' => [
                        'width'=>'50%',

                        'allowClear' => true
                    ],
                ]);
                ?>
            </td>
            <td class="bill-info-col"> Order No:</td>
            <td> UKR161012</td>
        </tr>
        <tr>
            <td class="bill-info-col">Address:</td>
            <td> 2
                Timiryazevskaya str. 04014 Kyiv,Ukraine
            </td>
            <td class="bill-info-col"> Payment Item:</td>
            <td> CPT
                Kyiv Ukraine
            </td>
        </tr>
        <tr>
            <td class="bill-info-col">Tel:</td>
            <td> +380445373257</td>
            <td class="bill-info-col"> Shipment:</td>
            <td></td>
        </tr>
        </tbody>
    </table>
    <table align="center" cellpadding="0" cellspacing="0" class="table-products">
        <tbody>
        <tr>
            <td colspan="2" scope="col" class="product-header-col">Comment</td>
            <td colspan="2" scope="col" class="product-header-col">Cpx Kyiv Ukraine VAT Paid</td>
            <td colspan="4" scope="col" class="product-header-col">H.S.CODE:8207300090 punch press tooling</td>
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

        <tr class="product-item-row">
            <td class="item-position-row">22</td>
            <td class="part-code-row">HT.BP2SQ.</td>
            <td class="description-row" colspan="2">B STN Thk Turret 85 Punch SQ 10/10</td>
            <td class="amount-row">1</td>
            <td class="unit-row">34.9</td>
            <td class="total-row">34.9</td>
            <td class="remark-row">0+135DEG</td>
        </tr>
        <tr class="product-item-row">
            <td class="item-position-row">22</td>
            <td class="part-code-row">HT.BP2SQ.</td>
            <td class="description-row" colspan="2">B STN Thk Turret 85 Punch SQ 10/10</td>
            <td class="amount-row">1</td>
            <td class="unit-row">34.9</td>
            <td class="total-row">34.9</td>
            <td class="remark-row">0+135DEG</td>
        </tr>
        <tr class="product-item-row">
            <td class="item-position-row">22</td>
            <td class="part-code-row">HT.BP2SQ.</td>
            <td class="description-row" colspan="2">B STN Thk Turret 85 Punch SQ 10/10</td>
            <td class="amount-row">1</td>
            <td class="unit-row">34.9</td>
            <td class="total-row">34.9</td>
            <td class="remark-row">0+135DEG</td>
        </tr>
        <tr class="product-item-row">
            <td class="item-position-row">22</td>
            <td class="part-code-row">HT.BP2SQ.</td>
            <td class="description-row" colspan="2">B STN Thk Turret 85 Punch SQ 10/10</td>
            <td class="amount-row">1</td>
            <td class="unit-row">34.9</td>
            <td class="total-row">34.9</td>
            <td class="remark-row">0+135DEG</td>
        </tr>
        <tr class="product-item-row">
            <td colspan="8"></td>
        </tr>


        <tr class="product-item-row">
            <td>&nbsp;</td>
            <td>Freight</td>
            <td colspan="2" class="description-row">Freight</td>
            <td>1</td>
            <td>195.75</td>
            <td><p>195.75</p></td>
            <td>35 kg DHL - $195.75</td>
        </tr>
        <tr class="product-footer-col">
            <td colspan="3" class="description-row">Country of origin of position 1-42:(China)</td>
            <td width="173">
                <div align="right">Total pcs:</div>
            </td>
            <td>45.000</td>
            <td colspan="2">Total Value(US$):</td>
            <td>1922.85</td>
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

<?php ActiveForm::end(); ?>
<?php yii\widgets\Pjax::end() ?>