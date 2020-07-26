<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $css = [
        'public/css/vendor/bootstrap.min.css',
        'public/css/vendor/font-awesome.min.css',
        'public/css/vendor/owl.carousel.min.css',
        'public/css/vendor/owl.theme.default.min.css',
//        'public/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css',
//        'public/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css',
        'public/css/vendor/magnific-popup.css',
        'public/css/vendor/animate.min.css',
        'public/css/style.css',
//        'public/css/bootsnav.css'
    ];
    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $js = [
//        'public/js/bootsnav.js',
        'public/js/vendor/modernizr.min.js',

        'public/js/vendor/jquery.min.js',
        'public/js/vendor/bootstrap.min.js',
        'public/js/vendor/owl.carousel.js',
//        'public/plugins/OwlCarousel2-2.3.4/dist/owl.carousel.min.js',
        'public/js/vendor/jquery.magnific-popup.min.js',
        'public/js/vendor/isotope.pkgd.min.js',
        'public/js/vendor/imagesloaded.pkgd.min.js',

        'public/js/vendor/validator.min.js',
        //'public/js/vendor/form-scripts.js',

        //'public/js/googlemap-setting.js',
        //'https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU&callback=initMap',

        'public/js/script.js',

    ];
    public $depends = [

    ];
}
