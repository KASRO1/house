<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kyc_application extends Model
{
    use HasFactory;


    protected $fillable = [
        "user_id",
        "sex",
        "first_name",
        "last_name",
        "data_of_birth",
        "phone",
        "country",
        "city",
        "address",
        "zip_code",
        "status",
    ];
}
