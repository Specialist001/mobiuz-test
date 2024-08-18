<?php

use common\models\Application\Application;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var backend\models\Application\ApplicationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="br-section-wrapper">
    <div class="application-index">

        <h3><?= Html::encode($this->title) ?></h3>


        <?php Pjax::begin(); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'options'      => [
                'class' => 'bd bd-gray-300 rounded table-responsive'
            ],
            'layout'=>'{pager}{items}{summary}{pager}',
            'pager' => [
                'class' => 'yii\bootstrap5\LinkPager',
                'maxButtonCount' => 5,
                'options' => [
                    'class' => 'pagination mt-2 float-right',
                ],
            ],
            'columns'      => [
//                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'id',
                    'headerOptions' => ['style' => 'width:120px']
                ],
                'full_name',
                'email',
                [
                    'attribute' => 'phone',
                    'headerOptions' => ['style' => 'width:150px'],
                    'contentOptions' => ['style' => 'width:150px'],
                ],
                [
                    'attribute' => 'message',
                    'format' => 'raw',
                    // trim the message to 50 characters
                    'value' => function (Application $model) {
                        $trimmed = mb_strlen($model->message) > 30 ? mb_substr($model->message, 0, 30) . '...' : $model->message;
                        // link to view, with target _blank
                        return Html::a($trimmed, Url::toRoute(['view', 'id' => $model->id]));
                    },
                ],
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function (Application $model) {
                        return $model->getStatusName();
                    },
                    'filter' => \common\models\Application\Enum\ApplicationStatusEnum::getStatusList(),
                ],
                //'moderator_comment:ntext',
                [
                    'attribute' => 'created_at',
                    'format' => ['date', 'php:d-m-Y H:i:s'],
                    'headerOptions' => ['style' => 'min-width: 100px;'],
                    'contentOptions' => ['style' => 'min-width: 100px;'],
                    'filter' => kartik\daterange\DateRangePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'created_at',
                        'convertFormat' => true,

                        'startAttribute' => 'create_start_date',
                        'endAttribute' => 'create_end_date',
                        'pluginOptions' => [
                            'timePicker' => true,
                            'timePickerIncrement' => 10,
                            'timePicker24Hour' => true,
                            'locale' => [
                                'format' => 'd-m-Y H:i:s'
                            ]
                        ]
                    ]),
                ],
                [
                    'attribute' => 'updated_at',
                    'format' => ['date', 'php:d-m-Y H:i:s'],
                    'headerOptions' => ['style' => 'min-width: 100px;'],
                    'contentOptions' => ['style' => 'min-width: 100px;'],
                    'filter' => kartik\daterange\DateRangePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'updated_at',
                        'convertFormat' => true,

                        'startAttribute' => 'update_start_date',
                        'endAttribute' => 'update_end_date',
                        'pluginOptions' => [
                            'timePicker' => true,
                            'timePickerIncrement' => 10,
                            'timePicker24Hour' => true,
                            'locale' => [
                                'format' => 'd-m-Y H:i:s'
                            ]
                        ]
                    ]),
                ],
                [
                    'headerOptions' => ['style' => 'min-width: 90px;'],
                    'contentOptions' => ['style' => 'min-width: 90px;', 'class' => 'text-center'],
                    'template' => '{view} {update}',
                    'class'      => ActionColumn::class,
                    'urlCreator' => function ($action, Application $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

        <?php Pjax::end(); ?>

    </div>
</div>
