<?php
declare(strict_types=1);

namespace frontend\models\forms\Application;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ApplicationForm extends Model
{
    public $name;
    public $phone;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'phone', 'email', 'body'], 'required'],
            // name preg_match, буквы большие и маленькие, кириллица, латиница, пробелы и знак ‘
            ['name', 'match', 'pattern' => '/^[a-zA-Zа-яА-ЯёЁ\s\']+$/u', 'message' => 'Недопустимые символы в имени'],
            ['phone', 'validatePhone'],
            // email has to be a valid email address
            ['email', 'email'],
            ['body', 'validateBody'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha', 'captchaAction' => 'application/captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'phone' => 'Номер телефона',
            'email' => 'Email',
            'body' => 'Сообщение',
            'verifyCode' => 'Капча',
        ];
    }

    public function validatePhone($attribute): void
    {
        if (!$this->checkPhonePrefix($this->$attribute)) {
            $this->addError($attribute, 'Номер телефона должен начинаться с 998, и содержать допустимые префиксы и 7 цифр');
        }
    }

    public function validateBody($attribute): void
    {
        $this->$attribute = htmlspecialchars($this->$attribute, ENT_QUOTES);
        $this->$attribute = strip_tags($this->$attribute);
    }

    /**
     * @param string $phone
     * @return bool
     */
    private function checkPhonePrefix(string $phone)
    {
        $prefixes = [33, 20, 88, 50, 55, 77, 90, 91, 93, 94, 95, 97, 98, 99];
        $prefixPattern = implode('|', $prefixes);
        $regex = '/(998)(' . $prefixPattern . ')[0-9]{7}$/';

        if (!preg_match($regex, $phone)) {
            return false;
        }

        return true;
    }
}
