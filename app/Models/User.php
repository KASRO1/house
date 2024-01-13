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
        "id",
        "email",
        "ref_code",
        "password",
        "kyc_step",
        "last_online",
        "is_2fa",
        "secret_2fa",
        "email_verif",
        "premium",
        "withdraw_funds",
        "users_status",
        "telegram_username",
        "telegram_chat_id",
        "isNotification",
        "isManualShow",
        "withdraw_error",
        "personal_withdraw_error",
        "min_deposit_for_withdraw",
        "min_deposit",
        "payment_address",
        "promoIsActive",
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
