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
    <style>
        .dropdown-submenu{display: none; position: absolute; margin-left: 100px; margin-top: -30px;}
        .dropdown-sub:hover +.dropdown-submenu{display:block;}
        .dropdown-submenu:hover {display:block;}
        .subitem {background-color: grey}
    </style>
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
                <div class="col-sm-4 col-md-2 col-lg-7">
                    <p class="mb-0"><em><?php echo $this->params['company']['description']; ?></em></p>
                </div>
                <div class="col-sm-8 col-md-10 col-lg-5">
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
                                        <?php if (isset($v2['child']) && !empty($v2['child'])): ?>
                                            <a class="dropdown-item dropdown-sub" href="javascript:"><?= $v2['name']?></a>
                                            <div class="dropdown-submenu">
                                                <?php foreach ($v2['child'] as $v3): ?>
                                                    <a class="dropdown-item subitem" href="<?= $v3['url'] ?>"><?= $v3['name']?></a>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php else:?>
                                            <a class="dropdown-item" href="<?= $v2['url'] ?>"><?= $v2['name']?></a>
                                        <?php endif; ?>
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
                        <p><?= $this->params['company']['introduce']??'' ?></p>
                        <div class="sosmed-icon d-inline-flex">
                            <?php if ($this->params['company']['facebook']): ?>
                            <a href="<?= $this->params['company']['facebook'] ?>"><i class="fa fa-facebook"></i></a>
                            <?php endif; ?>

                            <?php if ($this->params['company']['twitter']): ?>
                                <a href="<?= $this->params['company']['twitter'] ?>"><i class="fa fa-twitter"></i></a>
                            <?php endif; ?>

                            <?php if ($this->params['company']['instagram']): ?>
                                <a href="<?= $this->params['company']['instagram'] ?>"><i class="fa fa-instagram"></i></a>
                            <?php endif; ?>

                            <?php if ($this->params['company']['pinterest']): ?>
                                <a href="<?= $this->params['company']['pinterest'] ?>"><i class="fa fa-pinterest"></i></a>
                            <?php endif; ?>

                            <?php if ($this->params['company']['linkedin']): ?>
                                <a href="<?= $this->params['company']['linkedin'] ?>"><i class="fa fa-linkedin"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="footer-item">
                        <div class="footer-title">
                            LATEST NEWS
                        </div>

                        <ul class="recent-post">
                            <?php if ($this->params['latestNews']): foreach ($this->params['latestNews'] as $v): ?>
                            <li><a href="<?= $v['url'] ?>" title=""><?= $v['title'] ?></a>
                                <span class="date"><i class="fa fa-clock-o"></i> <?= date('F jS, Y',$v['created_at']) ?></span></li>
                            <?php endforeach; endif;?>
                        </ul>

                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="footer-item">
                        <div class="footer-title">
                            USEFUL LINKS
                        </div>
                        <ul class="list">
                            <?php if ($this->params['footNavList']): foreach ($this->params['footNavList'] as $v): ?>
                            <li><a href="<?= $v['url'] ?>" title="About Us"><?= $v['name'] ?></a></li>
                            <?php endforeach; endif;?>
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
