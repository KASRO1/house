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

    public $spread;
    /**
     * @var mixed|string
     */
    protected $primaryKey = 'id_coin';
    public $type_coin;
    protected $fillable = [
        "id_coin",
        "full_name",
        "simple_name",
        "staking_percent",
        "spread",
        "min_deposit",
        "id_coingaps",
        "payment_active"
    ];



}
