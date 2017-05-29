<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dogovor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dogovor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_executor')->textInput() ?>

    <?= $form->field($model, 'doc_template_id')->textInput() ?>

    <?= $form->field($model, 'id_contractor')->textInput() ?>

    <?= $form->field($model, 'id_bank_contractor')->textInput() ?>

    <?= $form->field($model, 'id_bank_executor')->textInput() ?>

    <?= $form->field($model, 'id_author')->textInput() ?>

    <?= $form->field($model, 'dogovor_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delivery_date')->textInput() ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'total_summ')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'closed_date')->textInput() ?>

    <?= $form->field($model, 'updated_date')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ '' => '', 'в работе' => 'в работе', 'на подписании' => 'на подписании', 'не заключили' => 'не заключили', 'расторгнут' => 'расторгнут', 'закрыт' => 'закрыт', 'приостановлен' => 'приостановлен', 'не оплачен' => 'не оплачен', 'оплачен' => 'оплачен', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'folder_path')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
