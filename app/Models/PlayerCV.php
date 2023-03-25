<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerCV extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'cv'
    ];

    public function player()
    {
        return $this->belongsTo(User::class);
    }
}
