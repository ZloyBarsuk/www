<?php

namespace app\components;


use Yii;
use yii\base\Component;


class Aliases extends Component
{
    public function init()
    {
        Yii::setAlias('@upload_dir', Yii::getAlias('@web').'/uploads/signatures/');
    }
}