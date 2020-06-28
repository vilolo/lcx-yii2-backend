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
                <!-- Item 1 -->
                <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
                    <div class="box-icon-1 text-center">
                        <div class="icon">
                            <i class="fa fa-paint-brush"></i>
                        </div>
                        <div class="body-content">
                            <h4>Awesome Design</h4>
                            <p>Dolor sit amet dolor gravida placerat liberolorem ipsum dolor consectetur adipiscing elit, sed do eiusmod.</p>
                        </div>
                    </div>
                </div>
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
                        WHO WE ARE?
                    </h2>

                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo invent.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    <a href="#" class="btn btn-primary">READ MORE</a>
                    <div class="spacer-30"></div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">

                    <div id="whoweare" class="whoweare owl-carousel owl-theme" data-background="../../public/images/laptop.png">
                        <!-- Item 1 -->
                        <div class="item">
                            <img src="../../public/images/dummy-img-600x400.jpg" alt="">
                        </div>
                        <!-- Item 2 -->
                        <div class="item">
                            <img src="../../public/images/dummy-img-600x400.jpg" alt="">
                        </div>
                        <!-- Item 3 -->
                        <div class="item">
                            <img src="../../public/images/dummy-img-600x400.jpg" alt="">
                        </div>
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

                <!-- Item 1 -->
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="rs-news-1 mb-1">
                        <div class="media-box">
                            <div class="meta-date"><span>30</span>May</div>
                            <a href="blog-single.html">
                                <img src="../../public/images/dummy-img-600x500.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="body-box">
                            <div class="title"><a href="blog-single.html">TYPING NEW KEYBOARD</a></div>
                            <p>Dignissimos ccusamus et iusto odio ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores....</p>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="rs-news-1 mb-1">
                        <div class="media-box">
                            <div class="meta-date"><span>04</span>Jun</div>
                            <a href="blog-single.html">
                                <img src="../../public/images/dummy-img-600x500.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="body-box">
                            <div class="title"><a href="blog-single.html">NEW HARDWARE SHOW UP</a></div>
                            <p>Dignissimos ccusamus et iusto odio ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores....</p>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="rs-news-1 mb-1">
                        <div class="media-box">
                            <div class="meta-date"><span>16</span>Jun</div>
                            <a href="blog-single.html">
                                <img src="../../public/images/dummy-img-600x500.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="body-box">
                            <div class="title"><a href="blog-single.html">MOCK WITH WOOD TABLE</a></div>
                            <p>Dignissimos ccusamus et iusto odio ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores....</p>
                        </div>
                    </div>
                </div>

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

<?php
//    $js = "alert('asdf')";
//    $this->registerJs($js);
?>
