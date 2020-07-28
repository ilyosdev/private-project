<?php

/** @var $dataProvider \common\models\Payment */

use yii\helpers\Url;
?>

<a href="<? echo Yii::$app->params['site_url'] .$dataProvider['img']?>" target="_blank">
    <img width="250px" src="<? echo Yii::$app->params['site_url'] .$dataProvider['img']?>">
</a>