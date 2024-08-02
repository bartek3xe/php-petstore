<?php

declare(strict_types=1);

namespace App\Enums;

enum PetStatusEnum: string
{
    case Available = 'available';
    case Pending = 'pending';
    case Sold = 'sold';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
