<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail_prefreneces_notification extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'user_id',
        'mention',
        'message',
        'comment',
        'article',
        'follow',
        'sign_up_via_profile',
        'revelent_post',

    ];
}
