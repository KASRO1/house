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
        'drainer',
        'about_text1',
        'about_text2',
        'about_img1',
        'about_img2',
        'faq',
        'status',
        'isGift',
        'amountGift',
        'coinGift',
        'text_gift',
        'stacking_percent',
        'spread_coins',

    ];

    public static function getDomain()
    {
        return Domain::where('domain', $_SERVER['SERVER_NAME'])->first();
    }
}
