<?php
/**
 * Created by PhpStorm.
 * User: lijian
 * Date: 27/12/17
 * Time: 下午2:59
 */
namespace app\assets;

use yii\web\AssetBundle;


class TableAsset extends AssetBundle{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'css/dataTables.bootstrap.css',
        'css/dataTables.plugins.css',
        'css/theme.css',
    ];
    public $js = [
        'js/jquery.dataTables.js',
        'js/dataTables.tableTools.min.js',
        'js/dataTables.colReorder.min.js',
        'js/dataTables.bootstrap.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}