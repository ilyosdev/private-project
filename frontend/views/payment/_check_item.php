<?php

/** @var $model \common\models\Payment */

use yii\helpers\Url;
?>

<a href="<?php echo $model->getCheckLink()?>" target="_blank">
    <img width="250px" src="<? echo $model->getCheckLink()?>">
</a>