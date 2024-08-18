<?php

use yii\helpers\Url;

?>
<div class="br-sideleft overflow-y-auto ps ps--theme_default ps--active-y">
    <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
    <div class="br-sideleft-menu">
        <a href="<?php echo Yii::$app->homeUrl; ?>" class="br-menu-link <?php echo \Yii::$app->controller->id == 'site' ? 'active' : "" ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="<?= Url::to(['/application']) ?>" class="br-menu-link <?php echo \Yii::$app->controller->id == 'application' ? 'active' : "" ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
                <span class="menu-item-label">Заявки</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->

    </div>
</div>