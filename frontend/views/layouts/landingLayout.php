<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css" />
    <link href="<?=Url::home();?>css/custom.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php $this->beginBody() ?>

        <nav class="navbar navbar-expand-md navbar-light bg-light static-top">
            <div class="container py-1">
                <a class="navbar-brand" href="<? echo Yii::$app->homeUrl; ?>"><? echo Yii::$app->name; ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="login.html" class="btn btn-outline-primary  ml-auto" type="submit">Kirish</a>
            </div>
        </nav>

        <?= Alert::widget() ?>

        <?= $content ?>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
