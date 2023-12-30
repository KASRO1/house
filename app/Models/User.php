<?php

namespace App\Models;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use HasFactory;
    use \Illuminate\Auth\Authenticatable;

    protected $fillable = [
        "email",
        "ref_code",
        "password",
        "kyc_step",
        "last_online",
        "2fa",
        "email_verif",
        "users_status",
        "telegram_username",
        "telegram_chat_id",
        "isNotification",
        "isManualShow",
        "payment_address",
        "wallets"
    ];

    protected  $hidden = [
        "password",
        "remember_token"
    ];

    public function hasRole($role)
    {
        return $this->users_status === $role;
    }

}
