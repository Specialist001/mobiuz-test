<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Application\Application $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="application-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-12 col-md-4">
            <?= $form->field($model, 'full_name')->textInput(['maxlength' => true, 'disabled' => true]) ?>
        </div>
        <div class="col-12 col-md-4">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'disabled' => true]) ?>
        </div>
        <div class="col-12 col-md-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'disabled' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <?= $form->field($model, 'message')->textarea(['rows' => 4]) ?>
        </div>
        <div class="col-12 col-md-6">
            <?= $form->field($model, 'moderator_comment')->textarea(['rows' => 4]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-3">
            <?= $form->field($model, 'status')->dropDownList(\common\models\Application\Enum\ApplicationStatusEnum::getStatusList()) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
