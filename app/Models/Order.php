<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
            "user_id",
            "type_order",
            "type_trade",
            "date_close",
            "symbol",
            "open_order_price",
            "close_order_price",
            "amount",
            "status",
            "created_at"

    ];


}
