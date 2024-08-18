<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Application\Application $model */

$this->title = 'Обновить заявку: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="br-section-wrapper px-5 py-4">
    <div class="application-update">

        <h3><?= Html::encode($this->title) ?></h3>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
