<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StakingOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "user_id",
        "coin_id",
        "coin_symbol",
        "days",
        "percent",
        "amount",
        "final_amount",
    ];

}
