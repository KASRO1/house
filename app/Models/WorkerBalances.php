<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerBalances extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "coin_id",
        "quantity"
    ];
}
