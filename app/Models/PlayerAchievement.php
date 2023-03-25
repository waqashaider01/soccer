<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerAchievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'achievements',
        'month',
        'year',
        'details',
        'country_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "player_id");
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
