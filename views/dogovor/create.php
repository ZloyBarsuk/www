<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dogovor */

$this->title = Yii::t('app', 'Create Dogovor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dogovors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dogovor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
