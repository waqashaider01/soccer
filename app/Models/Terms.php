<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    use HasFactory;
    protected $table='terms';
    // protected $primarykey='id';

    protected $fillable = [
        'terms_conditions',
    ];
    
}
