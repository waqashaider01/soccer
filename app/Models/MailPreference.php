<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailPreference extends Model
{
    use HasFactory;
    protected $table = "new_mail_preferences";
    protected $fillables = [
        'invite_status', 'follower_status', 'user_id'
    ];
}