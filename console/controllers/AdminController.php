<?php

namespace console\controllers;

use yii\console\Controller;

class AdminController extends Controller
{
    public function actionIndex()
    {
        echo "Hello, Admin!";
    }

    public function actionInsert()
    {
        $username = 'testadmin';
        $password_hash = \Yii::$app->getSecurity()->generatePasswordHash('testadmin');
        $auth_key = \Yii::$app->security->generateRandomString();
        $current = time();

        $db = \Yii::$app->db;

        // check this username is already exists
        $exists = $db->createCommand('SELECT id FROM users WHERE username = :username', [':username' => $username])->queryScalar();
        if ($exists) {
            $this->stderr("Admin with username $username already exists\n");
            return;
        }

        $transaction = $db->beginTransaction();
        try {
            $db->createCommand()->insert('users', [
                'username'      => $username,
                'password_hash' => $password_hash,
                'auth_key'      => $auth_key,
                'status'        => 10,
                'created_at'    => $current,
                'updated_at'    => $current
            ])->execute();
            $transaction->commit();
            $this->stdout("Admin with username $username has been created\n");
        } catch (\Exception $e) {
            $transaction->rollBack();
            $this->stderr("Error: " . $e->getMessage() . "\n");
        }

    }
}