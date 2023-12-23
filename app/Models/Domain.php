<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain',
        'user_id',
        'ns',
        'zone_id',
        'title',
        'logo',
        'stmp_host',
        'stmp_email',
        'stmp_password',
    ];
}
