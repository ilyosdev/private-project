<?php

    use backend\assets\AppAsset;
    use yii\helpers\Html;

    AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?= Html::csrfMetaTags() ?>
    <title>Advice.uz</title>
    <link rel="shortcut icon" href="/favicon.png" type="image/png">
    <?php $this->head() ?>
</head>
<body class="form-membership">
<?php $this->beginBody() ?>

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->


<?= $content ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
