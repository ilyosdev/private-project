<?php

    /* @var $this yii\web\View */
    /* @var $name string */
    /* @var $message string */

    /* @var $exception Exception */

    use yii\helpers\Html;
    use yii\helpers\Url;

    $this->title = $name;
?>
<div class="error-page">
    <div class="site-error">

        <h1><?= Html::encode($this->title) ?></h1>

        <div class="alert alert-danger">
            <?= nl2br(Html::encode($message)) ?>
        </div>

        <a href="<?= Url::home() ?>" class="btn btn-primary"><?= Yii::t("app", "Бош саҳифага қайтиш") ?></a>

    </div>
</div>