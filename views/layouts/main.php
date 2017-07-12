<?php
// use cornernote\ace\web\AceAsset;
use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

// !empty($viewPath) || $viewPath = '@vendor/cornernote/yii2-ace/src/views/layouts';
!empty($viewPath) || $viewPath = '@app/views/layouts';
!empty($viewNavbar) || $viewNavbar = $viewPath . '/_navbar';
!empty($viewSidebar) || $viewSidebar = $viewPath . '/_sidebar';
!empty($viewFooter) || $viewFooter = $viewPath . '/_footer';
!empty($viewContent) || $viewContent = $viewPath . '/_content';

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta charset="UTF-8">
        <?= Html::csrfMetaTags() ?>

        <title><?= Html::encode($this->title . ' :: ' . Yii::$app->name) ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?php $this->head() ?>
    </head>
    <?php $this->beginBody() ?>
    <body class="no-skin">

    <?= $this->render($viewNavbar) ?>

    <?php
    /*  first is modal windows for grid-view */

    Modal::begin([
        'header' => '<h4><div id="modalFirstHeader"> </div></h4>',
        'id' => 'modal-first',
        'options' => [
            'tabindex' => false // important for Select2 to work properly
        ],
        'size' => 'modal-lg',
        'toggleButton' => false,
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
    ]);
    echo "<div id='modalFirstContent'> </div>";
    Modal::end();

    ?>

    <?php
    /*  second is  modal windows for edit and create */

    Modal::begin([
        'header' => '<h4><div id="modalSecondHeader"> </div></h4>',
        'id' => 'modal-second',
        'options' => [
            'tabindex' => false // important for Select2 to work properly
        ],
        'size' => 'modal-lg',
        'toggleButton' => false,
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
    ]);
    echo "<div id='modalSecondContent'> </div>";
    Modal::end();

    ?>


    <div class="main-container" id="main-container">

        <?= $this->render($viewSidebar) ?>

        <?= $this->render($viewContent, ['content' => $content]) ?>

    </div>

    <?php

    echo \shifrin\noty\NotyWidget::widget([
        'options' => [

            'dismissQueue' => true,
            'layout' => 'topCenter',
            'theme' => 'relax',
            'animation' => [
                'open' => 'animated flipInX',
                'close' => 'animated flipOutX',
            ],
            'timeout' => Yii::$app->params['timeout_noty'],
            'progressBar' => true,
        ],
        'enableSessionFlash' => true,
        'enableIcon' => true,
        'registerAnimateCss' => true,
        'registerButtonsCss' => true,
        'registerFontAwesomeCss' => true,
    ]);
    ?>
    </body>
    <?php $this->endBody() ?>
    </html>

<?php $this->endPage() ?>