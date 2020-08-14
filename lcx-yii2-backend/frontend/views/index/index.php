<!-- BANNER -->
<div class="banner" style="height: 64%;">
    <div class="owl-carousel owl-theme full-screen">
        <?php foreach ($bannerList as $v): ?>
        <!-- Item 1 -->
        <div class="item">
            <img src="<?= $v['img'] ?>" alt="Slider">
            <div class="container d-flex align-items-center h-left">
                <div class="wrap-caption" style="width: 100%; ">
                    <h1 class="caption-heading"><?= $v['desc1'].'&nbsp;' ?></h1>
                    <p class="uk24"><?= $v['desc2'].'&nbsp;' ?></p>
                    <a href="<?= $v['url'] ?>" class="btn btn-primary" style="float: right;"><?= $v['btn_name'] ?></a>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
    <div class="custom-nav owl-nav"></div>
</div>

<!-- CTA -->
<div class="section bg-primary">
    <div class="content-wrap py-5">
        <div class="container">

            <div class="row align-items-center">
                <div class="col-sm-12 col-md-12">
                    <div class="cta-1">
                        <div class="body-text text-white mb-3">
                            <h3 class="my-1"><?= $titleBtn1['desc1']??'' ?></h3>
                            <p class="uk18 mb-0"><?= $titleBtn1['desc2']??'' ?></p>
                        </div>
                        <div class="body-action mt-3">
                            <a href="<?= $titleBtn1['url']??'' ?>" class="btn btn-secondary"><?= $titleBtn1['btn_name']??'' ?></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ABOUT -->
<div class="section">
    <div class="content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <h2 class="section-heading text-center">
                        <?= $titleDesc1['desc1']??''?>
                    </h2>
                    <p class="subheading text-center mb-5"><?= $titleDesc1['desc2']??''?></p>
                </div>
            </div>

            <div class="row">
                <?php if(!empty($iconText)): foreach ($iconText as $v):?>
                <!-- Item 1 -->
                <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
                    <div class="box-icon-1 text-center">
                        <div class="icon">
                            <img src="<?= $v['img'] ?>" style="margin-bottom: 2px;" width="86" height="86">
                        </div>
                        <div class="body-content">
                            <h4><?= $v['desc1'] ?></h4>
                            <p><?= $v['desc2'] ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- CTA -->
<?php if (!empty($videos)): ?>
<div id="videobox" class="owl-carousel owl-theme">
<?php foreach ($videos as $v): ?>
<div class="section bgi-cover-center cta" data-background="<?= $v['img']??''?>" style=" background-size: contain;background-repeat: no-repeat">
    <div class="content-wrap" style="padding: 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                    <div class="text-center">
                        <h2 class="text-white"><?= $v['desc1'].'&nbsp;' ?></h2>
                        <p class="uk18 text-white"><?= $v['desc2'].'&nbsp;' ?></p>
                        <a href="<?= $v['url']??''?>" class="popup-youtube btn-video">
                            <i class="fa fa-play fa-2x" style="position: relative; margin-bottom: 30px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>
</div>
<?php endif; ?>

<!-- WHO WE ARE -->
<?php if(!empty($carousel)):?>
<div class="section bg-gray-light">
    <div class="content-wrap">
        <div class="container">
            <div class="row">
                <?php foreach ($carousel as $k => $v): ?>
                    <div class="col-sm-12 col-md-12 col-lg-6 sync-text-img" tag="<?= $k ?>" style="display: <?php echo $k == 0 ? 'block;' : 'none;' ?>" >
                        <h2 class="section-heading text-left">
                            <?= $v['desc1'].'&nbsp;' ?>
                        </h2>
                        <?= $v['desc2'].'&nbsp;' ?>
                        <?php if ($v['url']): ?>
                            <a href="<?=$v['url']?>" class="btn btn-primary"><?= $v['btn_name'] ?></a>
                        <?php endif; ?>
                        <div class="spacer-30"></div>
                    </div>
                <?php endforeach; ?>
                <div class="col-sm-12 col-md-12 col-lg-6">

                    <div id="whoweare" class="whoweare owl-carousel owl-theme" data-background="../../public/images/laptop.png">
                        <?php foreach ($carousel as $v): ?>
                        <div class="item">
                            <img src="<?= $v['img']?>" alt="">
                        </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>

<!-- LATEST NEWS -->
<div class="section">
    <div class="content-wrap">
        <div class="container">

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <h2 class="section-heading text-center text-primary no-after mb-5">
                        <?= $titleDesc2['desc1']??''?>
                    </h2>
                    <p class="subheading text-center"><?= $titleDesc2['desc2']??''?></p>
                </div>
            </div>

            <div class="row mt-4">
                <?php if (!empty($product)): foreach ($product as $v): ?>
                <!-- Item 1 -->
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="rs-news-1 mb-1">
                        <div class="media-box">
                            <a href="<?=$v['url']?>">
                                <img src="<?= $v['img'] ?>" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="body-box">
                            <div class="title"><a href="<?=$v['url']?>"><?=$v['desc1']?></a></div>
                            <p><?=$v['desc2']?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif;?>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <h2 class="section-heading text-center text-primary no-after mb-5">
                        <?= $titleDesc3['desc1']??''?>
                    </h2>
                    <p class="subheading text-center"><?= $titleDesc3['desc2']??''?></p>
                </div>
            </div>
            
            <div class="row">
                <?php if (!empty($blog)): foreach ($blog as $v): ?>
                <!-- Item 1 -->
                <div class="col-sm-6 col-md-6 mb-5">
                    <div class="rs-news-1">
                        <div class="media-box">
                            <a href="<?=$v['url']?>">
                                <img src="<?= $v['img'] ?>" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="body-box">
                            <div class="title"><a href="<?=$v['url']?>"><?=$v['desc1']?></a></div>
                            <p><?= $v['desc2']??''?></p>
                            <a href="<?=$v['url']?>" class="btn btn-primary"><?= $v['btn_name']??''?></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif;?>
            </div>
            <div class="row mt-4">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="text-center">
                        <a href="<?= $bottomBtn['url']??'' ?>" class="btn btn-primary"><?= $bottomBtn['desc1']??'' ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$js = <<<JS
    $('#videobox').owlCarousel({
	    // stagePadding: 50,
	    loop: true,
	    // margin: 10,
	    autoplay: true,
        autoplayTimeout: 5000,
	    nav: true,
	    dots: false,
	    navText: [
	        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
	        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
	    ],
	    items: 1
	});	
JS;

$this->registerJs($js);
?>