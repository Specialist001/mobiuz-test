<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Application\Application $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="br-section-wrapper px-5 py-4">
    <div class="application-view">

        <h3><?= Html::encode($this->title) ?></h3>

        <p>
            <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        </p>

        <?= DetailView::widget([
            'model'      => $model,
            'attributes' => [
                'id',
                'full_name',
                'email:email',
                'phone',
                'message:ntext',
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return $model->getStatusName();
                    },
                ],
                'moderator_comment:ntext',
                [
                    'attribute' => 'created_at',
                    'format'    => ['date', 'php:d.m.Y H:i:s'],
                ],
                [
                    'attribute' => 'updated_at',
                    'format'    => ['date', 'php:d.m.Y H:i:s'],
                ],
            ],
        ]) ?>

    </div>
</div>
