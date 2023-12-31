<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory;

    protected $fillable = [
        'promo',
        'user_id',
        'coin_id',
        'amount',
        'text',
        'created_at',
        'updated_at',
    ];


}
