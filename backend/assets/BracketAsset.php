<?php

namespace backend\assets;

use yii\web\AssetBundle;

class BracketAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/vendor/bracket';

    public $css = [
        'lib/font-awesome/css/font-awesome.css',
        'lib/Ionicons/css/ionicons.css',
        'css/bracket.css',
    ];

    public $js = [
//        'lib/jquery/jquery.js',
        'lib/popper.js/popper.js',
        'lib/bootstrap/bootstrap.js',
        'lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js',
        'lib/moment/moment.js',
        'lib/jquery-ui/jquery-ui.js',
        'lib/jquery-switchbutton/jquery.switchButton.js',
        'lib/peity/jquery.peity.js',

        'js/bracket.js',
        'js/ResizeSensor.js',
        'js/dashboard.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap5\BootstrapAsset',
    ];
}