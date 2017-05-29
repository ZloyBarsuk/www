<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model_Contractor app\models\Contractor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contractor-form">

    <?php $form = ActiveForm::begin(

    ); ?>


</div>
<div class="contractor-form">
    <div class="row">

        <div class="col-md-6">

            <div class="form-group">

                <div class="col-md-9">
                    <div class="input-group">
                        <?= $form->field($model_Contractor, 'name_ua')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>

            <div class="form-group">

                <div class="col-md-9 col-xs-12">
                    <div class="input-group">
                        <?= $form->field($model_Contractor, 'name_en')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>

            <div class="form-group">

                <div class="col-md-6 col-xs-9">
                    <?= $form->field($model_Contractor, 'contractor_type')->dropDownList(['client' => Yii::t('app', 'Client'), 'owner' => Yii::t('app', 'Owner'),], ['prompt' => 'Выбери тип контрагента']) ?>

                </div>
            </div>

            <div class="form-group">

                <div class="col-md-9">
                    <?= $form->field($model_Contractor, 'signature')->textInput(['maxlength' => true]) ?>

                </div>
            </div>

        </div>
        <div class="col-md-6">

            <div class="form-group">

                <div class="col-md-9">
                    <div class="input-group">
                        <?php // $form->field($model_Contractor, 'filename')->textInput(['maxlength' => true]) ;?>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="col-md-9">
                    <?php //$form->field($model_Contractor, 'created_at')->textInput() ; ?>
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-9">
                    <?php //$form->field($model_Contractor, 'created_by')->textInput(); ?>

                </div>
            </div>


        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-9">


                    <?php if (!Yii::$app->request->isAjax) { ?>

                            <?= Html::submitButton($model_Contractor->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model_Contractor->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    <?php } ?>


                </div>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>
</div>