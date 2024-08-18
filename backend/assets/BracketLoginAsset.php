<?php

namespace backend\assets;

use yii\web\AssetBundle;

class BracketLoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/vendor/bracket';

    public $css = [
        'lib/font-awesome/css/font-awesome.css',
        'lib/Ionicons/css/ionicons.css',
        'css/bracket.css',
    ];

    public $js = [
        'lib/popper.js/popper.js',
        'lib/bootstrap/bootstrap.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap5\BootstrapAsset',
    ];
}