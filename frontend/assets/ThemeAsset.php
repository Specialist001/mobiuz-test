<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class ThemeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/vendor/bracket';

    public $css = [
        'lib/font-awesome/css/font-awesome.css',
        'css/bracket.css',
    ];

    public $js = [
//        'lib/jquery/jquery.js',
        'lib/popper.js/popper.js',
        'lib/bootstrap/bootstrap.js',
        'lib/moment/moment.js',
        'lib/jquery-ui/jquery-ui.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}