<?php

namespace App\Enums;

enum RoleEnum: int
{
    case REGISTERED = 1;
    case ADMIN = 2;
    case AGENT = 3;

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Администратор',
            self::REGISTERED => 'Зарегистрированный пользователь',
            self::AGENT => 'Агент'
        };
    }
}
