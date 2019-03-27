<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use odaialali\yii2toastr\ToastrFlash;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper wrapper-full-page">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
            <div class="container">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="#pablo">MercSky Africa</a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= Url::to(['/']) ?>" class="nav-link">
                                <i class="nc-icon nc-chart-pie-35"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::to(['/site/about']) ?>" class="nav-link">
                                <i class="nc-icon nc-globe-2"></i> About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::to(['/site/contact']) ?>" class="nav-link">
                                <i class="nc-icon nc-email-85"></i> Contact
                            </a>
                        </li>
                        <li class="nav-item  active ">
                            <a href="<?= Url::to(['/site/signup']) ?>" class="nav-link">
                                <i class="nc-icon nc-badge"></i> Register
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?= Url::to(['/site/login']) ?>" class="nav-link">
                                <i class="nc-icon nc-mobile"></i> Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="full-page register-page section-image" data-color="orange" data-image="<?= Yii::$app->request->baseUrl; ?>theme/img/bg5.jpg">
            <div class="content">
                <div class="container">
                    <?= $content ?>
                    <?= ToastrFlash::widget([
                        'options' => [
                            "closeButton" => true,
                            "debug" => false,
                            "newestOnTop" => true,
                            "progressBar" => false,
                            "positionClass" => 'toast-top-right',
                            "preventDuplicates" => false,
                            "onclick" => null,
                            "showDuration" => "1000",
                            "hideDuration" => "1000",
                            "timeOut" => "6000",
                            "extendedTimeOut" => "1000",
                            "showEasing" => "swing",
                            "hideEasing" => "linear",
                            "showMethod" => "fadeIn",
                            "hideMethod" => "fadeOut" //Use the jQuery show/hide method of your choice. These default to fadeIn/fadeOut. The methods fadeIn/fadeOut, slideDown/slideUp, and show/hide are built into jQuery.
                        ]
                    ]);?> 
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <nav>
                    <ul class="footer-menu">
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-center">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="https://www.creative-tim.com/">MercSky Africa</a>, made with love for a better web
                    </p>
                </nav>
            </div>
        </footer>
    </div>
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
