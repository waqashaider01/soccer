<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayersPortfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'player_id',
        'name',
        'profile_link',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function player()
    {
        return $this->belongsTo(User::class, 'player_id');
    }
}
