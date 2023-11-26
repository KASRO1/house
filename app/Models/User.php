<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        "email",
        "ref_code",
        "password",
        "kyc_step",
        "last_online",
        "2fa",
        "email_verif",
        "users_status",
        "telegram",
        "payment_address"
    ];

}
