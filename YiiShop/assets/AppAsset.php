<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    //подключаем сss
    public $css = [
        "css/bootstrap.min.css",
        "css/font-awesome.min.css",
        "css/prettyPhoto.css",
        "css/price-range.css",
        "css/animate.css",
        "css/main.css",
        "css/responsive.css",
    ];

    //подключаем js
    public $js = [
        "js/jquery.js",
        "js/bootstrap.min.js",
        "js/jquery.scrollUp.min.js",
        "js/jquery.cookie.js",
        "js/jquery.accordion.js",
        "js/price-range.js",
        "js/jquery.prettyPhoto.js",
        "js/main.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'kartik\datetime\DateTimePickerAsset',
        'yii\bootstrap\BootstrapAsset',
        // 'yii\bootstrap4\BootstrapAsset',
    ];
}
