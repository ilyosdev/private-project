<?php

    use backend\assets\AppAsset;
    use yii\bootstrap4\Breadcrumbs;
    use yii\bootstrap4\Modal;
    use yii\helpers\Html;
    use yii\helpers\Url;

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
    <?php $this->head() ?>
    <link rel="shortcut icon" href="/favicon.png" type="image/png">
</head>
<body class="horizontal-navigation">
<?php $this->beginBody() ?>

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<!-- BEGIN: Sidebar Group -->
<div class="sidebar-group">

    <!-- BEGIN: User Menu -->
    <div class="sidebar" id="user-menu">
        <div class="py-4 text-center" data-backround-image="/admin/resources/assets/media/image/image1.jpg">
            <figure class="avatar avatar-lg mb-3 border-0">
                <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?f=y" class="rounded-circle" alt="image">
            </figure>
            <h5 class="d-flex align-items-center justify-content-center"><?= Yii::$app->getUser()->identity->name ?></h5>
        </div>
        <div class="card mb-0 card-body shadow-none">
            <div class="mb-4">
                <div class="list-group list-group-flush">
                    <a href="/admin/site/logout" class="list-group-item p-l-r-0 text-danger" data-method="post"><?= Yii::t("app", "Чиқиш") ?></a>
                </div>
            </div>
        </div>
    </div>
    <!-- END: User Menu -->

</div>
<!-- END: Sidebar Group -->

<!-- begin::main -->
<div class="layout-wrapper">

    <!-- begin::header -->
    <div class="header d-print-none">

        <div class="header-left">
            <div class="navigation-toggler">
                <a href="#" data-action="navigation-toggler">
                    <i class="fa fa-menu"></i>
                </a>
            </div>
            <div class="header-logo">
                <a href=<?= Url::home() ?>>
                    <img class="logo" src="/admin/resources/assets/img/advice.svg" alt="logo">
                    <img class="logo-light" src="/admin/resources/assets/img/advice_light.svg" alt="light logo">
                </a>
            </div>
        </div>

        <div class="header-body">
            <div class="header-body-left">
                <div class="page-title">
                    <h4><?= Html::encode($this->title) ?></h4>
                </div>
            </div>
            <div class="header-body-right">
                <ul class="navbar-nav">

                    <!-- begin::header fullscreen -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                            <i class="maximize fa fa-compress"></i>
                            <i class="minimize fa fa-compress-alt"></i>
                        </a>
                    </li>
                    <!-- end::header fullscreen -->
                    <!-- begin::header dark mode -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" title="Mode" data-toggle="mode">
                            <i class="maximize fa fa-moon"></i>
                            <i class="minimize fa fa-sun"></i>
                        </a>
                    </li>
                    <!-- end::header mark mode -->

                    <!-- begin::header search -->
                    <li class="nav-item">
                        <a href="#" class="nav-link" title="<?= Yii::t("app", "Қидирув") ?>" data-toggle="search">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                    <!-- end::header search -->

                    <!-- begin::user menu -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" title="" data-sidebar-target="#user-menu">
                            <span class="mr-2 d-sm-inline d-none"><?= Yii::$app->getUser()->identity->name ?></span>
                            <figure class="avatar avatar-sm">
                                <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?f=y" class="rounded-circle" alt="avatar">
                            </figure>
                        </a>
                    </li>
                    <!-- end::user menu -->

                </ul>

                <!-- begin::mobile header toggler -->
                <ul class="navbar-nav d-flex align-items-center">

                </ul>
                <!-- end::mobile header toggler -->
            </div>
        </div>

    </div>
    <!-- end::header -->

    <div class="content-wrapper">

        <!-- begin::navigation -->
        <div class="horizontal-navigation">
            <ul>
                <li>
                    <a href="<?= Url::to(['/documents']) ?>">
                        <i class="mr-2 fa fa-file-alt"></i> <?= Yii::t("app", "Documents") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/news']) ?>">
                        <i class="mr-2 fa fa-file-alt"></i> <?= Yii::t("app", "News") ?>
                    </a>
                    <ul>
                        <li>
                            <a href="<?= Url::to(['/news']) ?>"><?= Yii::t("app", "News") ?></a>
                        </li>
                        <li><a href="<?= Url::to(['/questions']) ?>"><?= Yii::t("app", "Questions") ?></a></li>
                        <li>
                            <a href="<?= Url::to(['/pages']) ?>"><?= Yii::t("app", "Pages") ?></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= Url::to(['/forum']) ?>">
                        <i class="mr-2 fa fa-file-alt"></i> <?= Yii::t("app", "Forum") ?>
                    </a>
                    <ul>
                        <li><a href="<?= Url::to(['/forum']) ?>"><?= Yii::t("app", "Forum") ?></a></li>
                        <li><a href="<?= Url::to(['/forum-categories']) ?>"><?= Yii::t("app", "ForumCategories") ?></a></li>
                        <li><a href="<?= Url::to(['/comments']) ?>"><?= Yii::t("app", "Comments") ?></a></li>
                        <li><a href="<?= Url::to(['/users']) ?>"><?= Yii::t("app", "Users") ?></a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= Url::to(['/offices']) ?>">
                        <i class="mr-2 fa fa-file-alt"></i> <?= Yii::t("app", "Ходимлар") ?>
                    </a>
                    <ul>
                        <li><a href="<?= Url::to(['/offices']) ?>"><?= Yii::t("app", "Offices") ?></a></li>
                        <li><a href="<?= Url::to(['/experts']) ?>"><?= Yii::t("app", "Experts") ?></a></li>
                        <li><a href="<?= Url::to(['/freelancers']) ?>"><?= Yii::t("app", "Freelancers") ?></a></li>
                        <li><a href="<?= Url::to(['/about-sliders']) ?>"><?= Yii::t("app", "AboutSliders") ?></a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= Url::to(['/remarks?type=1']) ?>">
                        <i class="mr-2 fa fa-file-alt"></i> <?= Yii::t("app", "Таклифлар") ?>
                    </a>
                    <ul>
                        <li>
                            <a href="<?= Url::to(['/subscriber-questions']) ?>"><?= Yii::t("app", "SubscriberQuestions") ?></a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/remarks?type=1']) ?>"><?= Yii::t("app", "RemarksType1") ?></a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/remarks?type=2']) ?>"><?= Yii::t("app", "RemarksType2") ?></a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/remarks?type=3']) ?>"><?= Yii::t("app", "RemarksType3") ?></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= Url::to(['/country']) ?>">
                        <i class="mr-2 fa fa-file-alt"></i> <?= Yii::t("app", "Country") ?>
                    </a>
                    <ul>
                        <li>
                            <a href="<?= Url::to(['/country']) ?>"><?= Yii::t("app", "Country") ?></a>
                            <a href="<?= Url::to(['/regions']) ?>"><?= Yii::t("app", "Regions") ?></a>
                            <a href="<?= Url::to(['/districts']) ?>"><?= Yii::t("app", "Districts") ?></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="mr-2 fa fa-file-alt"></i> <?= Yii::t("app", "Append") ?>
                    </a>
                    <ul>
                        <li>
                            <a href="<?= Url::to(['/resource']) ?>"><?= Yii::t("app", "Resource") ?></a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/settings']) ?>"><?= Yii::t("app", "Settings") ?></a>
                        </li>
                        <li><a href="<?= Url::to(['/menus']) ?>"><?= Yii::t("app", "Menus") ?></a></li>
                        <li><a href="<?= Url::to(['/localizations']) ?>"><?= Yii::t("app", "Localizations") ?></a></li>
                        <li><a href="<?= Url::to(['/uz-lat-rules']) ?>"><?= Yii::t("app", "UzLatRules") ?></a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- end::navigation -->

        <div class="content-body">

            <div class="content">


                <?
                    if (isset($this->params['breadcrumbs'])) {
                        ?>
                        <div class="page-header">
                            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
                        </div>
                        <?
                    }
                ?>


                <?= $content ?>

            </div>

            <!-- begin::footer -->
            <footer class="content-footer">
                <div>© 2020 Advice.uz</div>
                <div>
                    <nav class="nav">
                        <a href="#" class="nav-link"></a>
                        <a href="#" class="nav-link"></a>
                    </nav>
                </div>
            </footer>
            <!-- end::footer -->

        </div>

    </div>

</div>
<!-- end::main -->

<!-- To use theme colors with Javascript -->
<div class="colors">
    <div class="bg-primary"></div>
    <div class="bg-primary-bright"></div>
    <div class="bg-secondary"></div>
    <div class="bg-secondary-bright"></div>
    <div class="bg-info"></div>
    <div class="bg-info-bright"></div>
    <div class="bg-success"></div>
    <div class="bg-success-bright"></div>
    <div class="bg-danger"></div>
    <div class="bg-danger-bright"></div>
    <div class="bg-warning"></div>
    <div class="bg-warning-bright"></div>
</div>

<?php

    Modal::begin([
        'id'   => 'main-modal',
        'size' => 'modal-md',
    ]);
    echo "<div id='main-modal-content'>" . Yii::t('app', "Илтимос, кутинг...") . "</div>";
    Modal::end();
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
