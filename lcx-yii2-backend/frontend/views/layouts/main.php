<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
    <title><?= Html::encode($this->title?$this->title:$this->params['company']['name']) ?></title>
    <?php $this->head() ?>

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="../../public/images/favicon.ico">
    <link rel="apple-touch-icon" href="../../public/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../public/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../public/images/apple-touch-icon-114x114.png">
</head>
<body data-spy="scroll" data-target="#navbar-example">
<?php $this->beginBody() ?>
<!-- LOAD PAGE -->
<div class="animationload">
    <div class="loader"></div>
</div>

<!-- BACK TO TOP SECTION -->
<a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>

<!-- HEADER -->
<div class="header header-1">

    <!-- TOPBAR -->
    <div class="topbar d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-4 col-md-2 col-lg-4">
                    <p class="mb-0"><em><?php echo $this->params['company']['description']; ?></em></p>
                </div>
                <div class="col-sm-8 col-md-10 col-lg-8">
                    <div class="info pull-right">
                        <div class="info-item">
                            <i class="fa fa-envelope-o"></i> Mail :  <?php echo $this->params['company']['email']; ?>
                        </div>
                        <div class="info-item">
                            <i class="fa fa-phone"></i> Call Us : <?php echo $this->params['company']['phone']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- NAVBAR SECTION -->
    <div class="navbar-main">
        <div class="container">
            <nav id="navbar-main" class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="/">
                    <img src="<?php echo $this->params['company']['logo']; ?>" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <?php foreach ($this->params['navList'] as $v):?>
                            <?php if (isset($v['child']) && !empty($v['child'])):?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="<?= $v['url'] ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= $v['name'] ?>
                                </a>
                                <div class="dropdown-menu">
                                    <?php foreach ($v['child'] as $v2): ?>
                                    <a class="dropdown-item" href="<?= $v2['url'] ?>"><?= $v2['name']?></a>
                                    <?php endforeach; ?>
                                </div>
                            </li>
                            <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $v['url'] ?>"><?= $v['name']?></a>
                            </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </nav> <!-- -->
        </div>
    </div>
</div>

<?= $content ?>

<!-- FOOTER SECTION -->
<div class="footer">
    <div class="content-wrap pb-0">
        <div class="container">

            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="footer-item">
                        <img src="<?php echo $this->params['company']['logo']; ?>" alt="logo bottom" class="logo-bottom">
                        <div class="spacer-30"></div>
                        <p>COXE is a clean, modern, and fully responsive Html Template. it is designed for corporate, finacial, insurance, agency, businesses or any type of person or business who wants to showcase their work, services and professional way.</p>
                        <div class="sosmed-icon d-inline-flex">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="footer-item">
                        <div class="footer-title">
                            LATEST NEWS
                        </div>

                        <ul class="recent-post">
                            <li><a href="#" title="">The Best in dolor sit amet consectetur adipisicing elit sed</a>
                                <span class="date"><i class="fa fa-clock-o"></i> June 16, 2017</span></li><li><a href="#" title="">The Best in dolor sit amet consectetur adipisicing elit sed</a>
                                <span class="date"><i class="fa fa-clock-o"></i> June 16, 2017</span></li>
                        </ul>

                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="footer-item">
                        <div class="footer-title">
                            USEFUL LINKS
                        </div>
                        <ul class="list">
                            <li><a href="#" title="About Us">About Us</a></li>
                            <li><a href="#" title="Corporate Profile">Corporate Profile</a></li>
                            <li><a href="#" title="Our Team">Our Team</a></li>
                            <li><a href="#" title="Portfolio">Portfolio</a></li>
                            <li><a href="#" title="Our Office">Our Office</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="footer-item">
                        <div class="footer-title">
                            CONTACT INFO
                        </div>

                        <ul class="list-info">
                            <li>
                                <div class="info-icon">
                                    <span class="fa fa-map-marker"></span>
                                </div>
                                <div class="info-text"><?= $this->params['company']['address'] ?></div> </li>
                            <li>
                                <div class="info-icon">
                                    <span class="fa fa-phone"></span>
                                </div>
                                <div class="info-text"><?= $this->params['company']['phone'] ?></div>
                            </li>
                            <li>
                                <div class="info-icon">
                                    <span class="fa fa-envelope"></span>
                                </div>
                                <div class="info-text"><?= $this->params['company']['email'] ?></div>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="fcopy">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <p class="ftex">Copyright 2019 &copy; <span class="color-primary">Coxe HTML Template</span>. Designed by <span class="color-primary">Rometheme.</span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
