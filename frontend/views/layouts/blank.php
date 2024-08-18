<?php

/** @var yii\web\View $this */

/** @var string $content */

use common\widgets\Alert;
//use yii\bootstrap5\Alert;
use yii\helpers\Html;

\frontend\assets\ThemeAsset::register($this);

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <div class="br-logo border-0"><a href=""><span>[</span>bracket<span>]</span></a></div>
    <?= $this->render('_blank_header') ?>

    <div class="br-mainpanel">
        <div class="container pd-y-15 pd-l-20">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
