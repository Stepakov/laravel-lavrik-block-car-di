<?php

namespace App\Services\Enum;

enum Status : int
{
    case DRAFT = 0;
    case ACTIVE = 5;
    case SOLD = 10;
    case CANCELED = 15;

    public function text()
    {
        return match( $this )
        {
                self::DRAFT => 'Черновик',
                self::ACTIVE => 'Активный',
                self::SOLD => 'Продано',
                self::CANCELED => 'Отменено',
        };
    }
}
