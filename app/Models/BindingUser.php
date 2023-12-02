<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BindingUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id_worker',
        'user_id_mamont',
        'type'
    ];
}
