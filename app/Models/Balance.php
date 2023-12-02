<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "user_id",
        "coin_id",
        "quantity",
    ];

    protected $casts = [
        "id" => "integer",
        "user_id" => "integer",
        "coin_id" => "integer",
        "quantity" => "float",
    ];
}
