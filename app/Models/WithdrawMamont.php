<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawMamont extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'worker_id',
        'symbol',
        'address',
        'amount',
    ];
}
