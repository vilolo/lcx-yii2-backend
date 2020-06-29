<!-- BANNER -->
<div class="banner">
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
                            <h3 class="my-1">Grow Up Your Business With Coxe</h3>
                            <p class="uk18 mb-0">We provide high standar clean website for your business solutions</p>
                        </div>
                        <div class="body-action mt-3">
                            <a href="#" class="btn btn-secondary">PURCHASE NOW</a>
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
                        Hello! Welcome to Coxe Business
                    </h2>
                    <p class="subheading text-center mb-5">Awesome features we offer exclusive only</p>
                </div>

            </div>

            <div class="row">
                <?php if(!empty($iconText)): foreach ($iconText as $v):?>
                <!-- Item 1 -->
                <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
                    <div class="box-icon-1 text-center">
                        <div class="icon">
                            <i class="fa fa-paint-brush"></i>
                        </div>
                        <div class="body-content">
                            <h4><?= $v['desc1'] ?></h4>
                            <p><?= $v['desc2'] ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; ?>
                <!-- Item 2 -->
                <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
                    <div class="box-icon-1 text-center">
                        <div class="icon">
                            <i class="fa fa-gears"></i>
                        </div>
                        <div class="body-content">
                            <h4>Easy Customize</h4>
                            <p>Dolor sit amet dolor gravida placerat liberolorem ipsum dolor consectetur adipiscing elit, sed do eiusmod.</p>
                        </div>
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
                    <div class="box-icon-1 text-center">
                        <div class="icon">
                            <i class="fa fa-rocket"></i>
                        </div>
                        <div class="body-content">
                            <h4>Fast Publish</h4>
                            <p>Dolor sit amet dolor gravida placerat liberolorem ipsum dolor consectetur adipiscing elit, sed do eiusmod.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA -->
<!--<div class="section bgi-cover-center cta" data-background="../../public/images/dummy-img-1920x900.jpg">-->
<!--    <div class="content-wrap">-->
<!--        <div class="container">-->
<!--            <div class="row align-items-center">-->
<!--                <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">-->
<!--                    <div class="text-center">-->
<!--                        <h2 class="text-white">COXE PRESENTATION</h2>-->
<!--                        <p class="uk18 text-white">Click this video to explore more</p>-->
<!--                        <a href="https://www.youtube.com/watch?v=vNDrLjOmUY4" class="popup-youtube btn-video"><i class="fa fa-play fa-2x"></i></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

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
                        LATEST NEWS
                    </h2>
                    <p class="subheading text-center">We provide high standar clean website for your business solutions</p>
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
                        <a href="#" class="btn btn-primary">MORE POST</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
