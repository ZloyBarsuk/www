<?php
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\Url;

?>

<?php $form = ActiveForm::begin(
    [
        'action' => 'media/upload',
        'id' => 'media-form',
        'options' => ['enctype' => 'multipart/form-data']
    ]) ?>

<? /*= $form->field($model, 'imageFile')->fileInput() */ ?>
<?php
echo $form->field($model, 'imageFile')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
    'pluginOptions' => [
        'previewFileType' => 'any',
        'uploadUrl' => Url::to(['/media/upload']),
        'allowedFileExtensions' => ['jpg', 'gif', 'png'],
        'showUpload' => true,
        'maxFileSize' => 10000000,
        'overwriteInitial' => true,
    ],
    'pluginEvents'=>[
        // "fileuploaded" => "function(event, data, previewId, index) { alert(JSON.stringify(data)); }",
      //  "fileuploaded" => "function(event, data, previewId, index) { $('#contractor-signature').val(data.filenames.[0]); }",
        "fileuploaded" => "function(event, data, previewId, index) { console.log(''); }",
        //'fileUploaded' => 'function(event, data, previewId, index){alert("File uploaded triggered");}',


    ]

]);
?>
    <!-- <button>Submit</button>-->

<?php ActiveForm::end() ?>