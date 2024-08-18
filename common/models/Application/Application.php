<?php

namespace common\models\Application;

use common\models\Application\Enum\ApplicationStatusEnum;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "applications".
 *
 * @property int $id
 * @property string $full_name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $message
 * @property int $status 0 - на рассмотрении, 1 - одобрено, 2 - отклонено
 * @property string|null $moderator_comment
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Application extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'applications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'created_at', 'updated_at'], 'required'],
            [['message', 'moderator_comment'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['status'], 'default', 'value' => ApplicationStatusEnum::STATUS_PENDING],
            [['status'], 'in', 'range' => [ApplicationStatusEnum::STATUS_PENDING, ApplicationStatusEnum::STATUS_APPROVED, ApplicationStatusEnum::STATUS_REJECTED]],
            [['full_name', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 13],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Номер телефона',
            'message' => 'Сообщение',
            'status' => 'Статус',
            'moderator_comment' => 'Комментарий модератора',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
            ],
        ];
    }

    public function getStatusName(): string
    {
        return ApplicationStatusEnum::getStatusList()[$this->status];
    }
}
