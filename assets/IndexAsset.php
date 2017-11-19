<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class IndexAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'css/jquery.datetimepicker.css',
        'css/fullcalendar.css',
        'css/theme.css',
        'css/admin-forms.css',
    ];
    public $js = [
        'js/build/jquery.datetimepicker.full.js',
        'js/jquery/jquery-ui.min.js',
        'js/jquery/jquery.magnific-popup.js',
        'js/moment.min.js',
        'js/fullcalendar.min.js',
        'js/utility.js',
        'js/demo.js',
        'js/main.js',


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
