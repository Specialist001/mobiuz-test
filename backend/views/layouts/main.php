<?php

/** @var \yii\web\View $this */

/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

//AppAsset::register($this);
\backend\assets\BracketAsset::register($this);
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
<body class="">
    <?php $this->beginBody() ?>
    <?php echo $this->render('_logo'); ?>
    <?php echo $this->render('_left-side'); ?>
    <?php echo $this->render('_header'); ?>
    <?php echo $this->render('_right-side'); ?>

    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <?= Breadcrumbs::widget([
                'links' => $this->params['breadcrumbs'] ?? [],
                'options' => ['class' => 'breadcrumb pd-0 mg-0 tx-14'],
            ]) ?>
        </div>
        <div class="pd-30">

            <?= Alert::widget() ?>
            <div class="br-pagebody mg-t-5 pd-x-30">
                <?= $content ?>
            </div>

            <footer class="footer mt-auto py-3 text-muted">
                <div class="container">
                    <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
                    <p class="float-end"></p>
                </div>
            </footer>

        </div>
    </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
