<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrainerLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain',
        'type',
        'OS',
        'browser',
        'IP',
        'country',
        'ts'
    ];
}
