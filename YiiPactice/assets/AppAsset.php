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

    public $basePath = '@webroot'; // алиас для изменения дефолтных путей
    public $baseUrl = '@web'; // алиас для изменения дефолтных путей
    public $css = [
        'css/site.css',
        'css/style.css', //подключение файла стилей
    ];
    public $js = [
        // 'js/script.js' //подключение js
    ];
    public $jsPosition = [
        'position' => \yii\web\View::POS_END //для подключения js в позциях на странице
    ];
    //зависимости
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
    ];
}
