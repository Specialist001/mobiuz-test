<?php

namespace common\models\Application\Enum;

enum ApplicationStatusEnum
{
    const STATUS_PENDING = 0;
    const STATUS_APPROVED = 1;
    const STATUS_REJECTED = 2;

    public static function getStatusList()
    {
        return [
            self::STATUS_PENDING => 'На рассмотрении',
            self::STATUS_APPROVED => 'Одобрено',
            self::STATUS_REJECTED => 'Отклонено',
        ];
    }
}
