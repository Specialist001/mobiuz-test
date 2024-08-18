<?php
declare(strict_types=1);

namespace frontend\actions\Application;

use common\models\Application\Application;
use frontend\models\forms\Application\ApplicationForm;
use Yii;

class IndexAction extends \yii\base\Action
{
    public function run()
    {
        $this->controller->layout = 'blank';

        $model = new ApplicationForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $application = new Application();
            $application->full_name = $model->name;
            $application->phone = $model->phone;
            $application->email = $model->email;
            $application->message = $model->body;

            if ($application->save(false)) {
                Yii::$app->session->setFlash('success', 'Ваше сообщение отправлено. Ждите ответа.');
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка отправки сообщения.');
                Yii::$app->session->setFlash('error', json_encode(value: $application->getErrors(), flags: JSON_UNESCAPED_UNICODE));
            }

            return $this->controller->refresh();
        }

        return $this->controller->render('index', [
            'model' => $model,
        ]);
    }
}