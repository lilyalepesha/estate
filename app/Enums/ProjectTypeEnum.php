<?php

namespace App\Enums;

enum ProjectTypeEnum: int
{
    case COTTAGE = 1;
    case VILLA = 2;
    case MANSION = 3;
    case ESTATE = 4;
    case RESIDENCE = 5;
    case TOWNHOUSE = 6;
    case LANEHOUSE = 7;
    case DUPLEX = 8;

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::COTTAGE => 'Коттедж',
            self::VILLA => 'Вилла',
            self::MANSION => 'Особняк',
            self::ESTATE => 'Усадьба',
            self::RESIDENCE => 'Резиденция',
            self::TOWNHOUSE => 'Таунхаус',
            self::LANEHOUSE => 'Лейнхаус',
            self::DUPLEX => 'Дуплекс',
        };
    }
}
