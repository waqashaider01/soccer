<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccVerification extends Model
{
    use HasFactory;

    protected $table = 'acc_verification_text';

    protected $fillable = [
        'title',
        'description',
    ];
}
