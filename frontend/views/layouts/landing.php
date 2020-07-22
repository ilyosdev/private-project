<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\widgets\Alert;

$this->beginContent('@frontend/views/layouts/base.php');
?>
    <main>
            <?= Alert::widget() ?>
            <?= $content ?>
    </main>
<?php $this->endContent() ?>