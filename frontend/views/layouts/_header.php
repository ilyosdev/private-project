<?php
use yii\helpers\Url;

?>
<nav class="navbar navbar-expand-md navbar-light bg-light static-top">
    <div class="container py-1">
        <a class="navbar-brand" href="<? echo Yii::$app->homeUrl; ?>"><? echo Yii::$app->name; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?
        if (Yii::$app->user->isGuest) {
            ?>
            <a href="<?= Url::to(['/site/login']) ?>" class="btn btn-outline-primary  ml-auto" type="submit">Kirish</a>
            <?
        } else {
            ?>
            <a href="<?= Url::to(['/site/logout']) ?>" class="btn btn-outline-primary  ml-auto" type="submit" data-method="post">Chiqish</a>
            <?
        }
        ?>
    </div>
</nav>