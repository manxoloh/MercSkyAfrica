<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use odaialali\yii2toastr\ToastrFlash;
use common\models\Classes;
use frontend\assets\AppAsset;

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
<div class="wrapper">
        <div class="sidebar" data-color="orange" data-image="<?= Yii::$app->request->baseUrl; ?>theme/img/bg5.jpg" style='background-image: url("<?= Yii::$app->request->baseUrl; ?>theme/img/sidebar-5.jpg");'>
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="<?= Url::to(['/']) ?>" class="simple-text logo-mini">
                        MA
                    </a>
                    <a href="<?= Url::to(['/']) ?>" class="simple-text logo-normal">
                        Merc Sky Africa
                    </a>
                </div>
                <div class="user">
                    <div class="photo">
                        <img src="<?= Yii::$app->request->baseUrl; ?>theme/img/default-avatar.png" />
                    </div>
                    <div class="info ">
                        <span>Solomon Maithya</span>
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= Url::to(['/']) ?>">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['/school/students']) ?>">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>
                                Admissions
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#examination">
                            <i class="nc-icon nc-notes"></i>
                            <p>
                                Examination
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="examination">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="<?= Url::to(['/school/exam-result']) ?>">
                                        <span class="sidebar-mini">R</span>
                                        <span class="sidebar-normal">Results</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="<?= Url::to(['/school/student-subject']) ?>">
                                        <span class="sidebar-mini">M</span>
                                        <span class="sidebar-normal">Marksheet</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>   
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['/school/payment']) ?>">
                            <i class="nc-icon nc-money-coins"></i>
                            <p>
                                Finance
                            </p>
                        </a>
                    </li>   
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['/school/teacher']) ?>">
                            <i class="nc-icon nc-single-02"></i>
                            <p>
                                Teachers
                            </p>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#attendance">
                            <i class="nc-icon nc-settings-90"></i>
                            <p>
                                Attendance
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="attendance">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="<?= Url::to(['/school/student-attendance']) ?>">
                                        <span class="sidebar-mini">S</span>
                                        <span class="sidebar-normal">Students</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="<?= Url::to(['/school/teacher-attendance']) ?>">
                                        <span class="sidebar-mini">T</span>
                                        <span class="sidebar-normal">Teachers</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['/communications/messages']) ?>">
                            <i class="nc-icon nc-chat-round"></i>
                            <p>
                                Messages
                            </p>
                        </a>
                    </li>                
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= Url::to(['/business/contacts']) ?>">
                            <i class="nc-icon nc-bag"></i>
                            <p>Business</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#settings">
                            <i class="nc-icon nc-settings-tool-66"></i>
                            <p>
                                Settings
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="settings">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="<?= Url::to(['/school/classes']) ?>">
                                        <span class="sidebar-mini">C</span>
                                        <span class="sidebar-normal">Classes</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="<?= Url::to(['/school/subject']) ?>">
                                        <span class="sidebar-mini">S</span>
                                        <span class="sidebar-normal">Subjects</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="<?= Url::to(['/school/payment-category']) ?>">
                                        <span class="sidebar-mini">P</span>
                                        <span class="sidebar-normal">Payment Category</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="<?= Url::to(['/school/payment-method']) ?>">
                                        <span class="sidebar-mini">P</span>
                                        <span class="sidebar-normal">Payment Method</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                    <?php if (Yii::$app->user->identity->user_type == "Superadmin") { ?>
                    
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#admin">
                            <i class="nc-icon nc-settings-90"></i>
                            <p>
                                Administration
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="admin">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="<?= Url::to(['/account/subscriptions/clients']) ?>">
                                        <span class="sidebar-mini">C</span>
                                        <span class="sidebar-normal">Clients</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> 
                    <?php } ?>
                    
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-warning btn-fill btn-round btn-icon d-none d-lg-block">
                                <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                                <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo"> Administrator Panel </a>
                    </div>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="nav navbar-nav mr-auto">
                            <form class="navbar-form navbar-left navbar-search-form" role="search">
                                <div class="input-group">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <input type="text" value="" class="form-control" placeholder="Search...">
                                </div>
                            </form>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-planet"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Create New Post</a>
                                    <a class="dropdown-item" href="#">Manage Something</a>
                                    <a class="dropdown-item" href="#">Do Nothing</a>
                                    <a class="dropdown-item" href="#">Submit to live</a>
                                    <li class="divider"></li>
                                    <a class="dropdown-item" href="#">Another action</a>
                                </ul>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-bell-55"></i>
                                    <span class="notification">5</span>
                                    <span class="d-lg-none">Notification</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Notification 1</a>
                                    <a class="dropdown-item" href="#">Notification 2</a>
                                    <a class="dropdown-item" href="#">Notification 3</a>
                                    <a class="dropdown-item" href="#">Notification 4</a>
                                    <a class="dropdown-item" href="#">Notification 5</a>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="https://example.com/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="nc-icon nc-bullet-list-67"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">
                                        <i class="nc-icon nc-email-85"></i> Messages
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="nc-icon nc-umbrella-13"></i> Help Center
                                    </a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="#">
                                        <i class="nc-icon nc-lock-circle-open"></i> Lock Screen
                                    </a>
                                    <a href="<?= Url::to(['/site/logout']) ?>" data-method="post" class="dropdown-item text-danger">
                                        <i class="nc-icon nc-button-power"></i> Log out
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <?= $content ?>  
                    <?= ToastrFlash::widget([
                        'options' => [
                            "closeButton" => true,
                            "debug" => false,
                            "newestOnTop" => true,
                            "progressBar" => false,
                            "positionClass" => 'toast-bottom-right',
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
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Blog
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-center">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="<?= Url::to(['/']) ?>">Merc Sky Africa</a>, made with love for a better web
                    </p>
                </nav>
            </div>
        </footer>
    </div>
</div>
<div class="modal fade" id="Modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"><?= Html::encode($this->title) ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              </div>
        </div>
	</div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
