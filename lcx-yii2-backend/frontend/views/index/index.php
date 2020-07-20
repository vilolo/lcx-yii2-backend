<!-- BANNER -->
<div class="banner" style="height: 66%;">
        <div class="owl-carousel owl-theme full-screen">
        <?php foreach ($bannerList as $v): ?>
        <!-- Item 1 -->
        <div class="item">
            <img src="<?= $v['img'] ?>" alt="Slider">
            <div class="container d-flex align-items-center h-left">
                <div class="wrap-caption">
                    <h1 class="caption-heading"><?= $v['desc1'] ?></h1>
                    <p class="uk24"><?= $v['desc2'] ?></p>
                    <a href="<?= $v['url'] ?>" class="btn btn-primary"><?= $v['btn_name'] ?></a>
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
                            <img src="<?= $v['img'] ?>" width="86" height="86">
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
<?php if ($video): ?>
<div class="section bgi-cover-center cta" data-background="<?= $video['img']??''?>" style=" background-size: contain;background-repeat: no-repeat">
    <div class="content-wrap" style="padding: 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                    <div class="text-center">
                        <h2 class="text-white"><?= $video['desc1']??''?></h2>
                        <p class="uk18 text-white"><?= $video['desc2']??''?></p>
                        <a href="<?= $video['url']??''?>" class="popup-youtube btn-video">
                            <i class="fa fa-play fa-2x" style="position: relative; margin-bottom: 30px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- WHO WE ARE -->
<div class="section bg-gray-light">
    <div class="content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h2 class="section-heading text-left">
                        <?= $desc['desc1']??'' ?>
                    </h2>
                    <?= $desc['desc2']??'' ?>
                    <?php if ($desc): ?>
                    <a href="<?=$v['url']?>" class="btn btn-primary">READ MORE</a>
                    <?php endif; ?>
                    <div class="spacer-30"></div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">

                    <div id="whoweare" class="whoweare owl-carousel owl-theme" data-background="../../public/images/laptop.png">
                        <?php if(!empty($carousel)): foreach ($carousel as $v): ?>
                        <div class="item">
                            <img src="<?= $v['img']?>" alt="">
                        </div>
                        <?php endforeach; endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

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
                            <a href="blog-single.html">
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
