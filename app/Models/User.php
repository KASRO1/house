<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
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
