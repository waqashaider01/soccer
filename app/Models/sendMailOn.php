<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sendMailOn extends Model
{
    use HasFactory;
    protected $table='sendmail_on';
     protected $primarykey='id';
     protected $fillable = [
        'user_id',
        'new_follower',
        'invite_refral',
     ];
}
