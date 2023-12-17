<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;

    /**
     * @var mixed|string
     */
    public $id_coin;
    /**
     * @var mixed|string
     */
    public $full_name;
    /**
     * @var mixed|string
     */
    public $simple_name;
    /**
     * @var mixed|string
     */
    public $payment_address;
    /**
     * @var mixed|string
     */
    public $spread;
    /**
     * @var mixed|string
     */
    public $type_coin;
    protected $fillable = [
        "id_coin",
        "full_name",
        "simple_name",
        "payment_address",
        "staking_percent"
    ];

    protected $casts = [
        "id_coin" => "string",
        "full_name" => "string",
        "simple_name" => "string",
        "payment_address" => "string",
    ];


}
