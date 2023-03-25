<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharePost extends Model
{
    use HasFactory;

    protected $fillable = [
        'share',
        'post_id',
    ];
}
