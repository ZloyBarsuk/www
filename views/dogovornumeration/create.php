<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DogovorNumeration */

$this->title = Yii::t('app', 'Create Dogovor Numeration');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dogovor Numerations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dogovor-numeration-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
