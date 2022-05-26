<?php

namespace common\models;

use Yii;

class ContainerManager
{
    public static function getContainer($id)
    {
        $container = Container::findOne($id);
        if ($container === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return $container;
    }
}
?>