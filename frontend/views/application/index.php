<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\forms\Application\ $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Оставить заявку';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1 class="mx-auto"><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-7">
            <p>
                Если у вас есть деловые предложения или другие вопросы, пожалуйста, заполните следующую форму, чтобы связаться с нами. Спасибо.
            </p>
            <?php $form = ActiveForm::begin(['id' => 'application-form']); ?>
            <div class="row">
                <div class="col-12">
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="col-12 col-md-6">
                    <?= $form->field($model, 'phone')
                        ->textInput(['number' => true])
                        ->widget(\yii\widgets\MaskedInput::class, [
                            'mask' => '999999999999',
                        ])
                    ?>
                </div>
                <div class="col-12 col-md-6">
                    <?= $form->field($model, 'email') ?>
                </div>
            </div>
                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    'captchaAction' => 'application/captcha',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
