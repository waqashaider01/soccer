<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockedUsers extends Model
{
    use HasFactory;
    protected $table='blocked_users';
    protected $primarykey='id';
    protected $fillable = [
        'user_id', 'blocked_id',
    ];
}
