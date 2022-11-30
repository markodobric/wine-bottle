<?php

declare(strict_types=1);

namespace App\Models\Enum;

enum BottleQuantity: string
{
    case Smaller = '0.75';
    case Bigger = '1';
}
