<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Enum\BottleQuantity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WineBottle extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'quantity' => BottleQuantity::class,
    ];
}
