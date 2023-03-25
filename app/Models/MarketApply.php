<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketApply extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'player_id',
        'market_id',
        'market_type',
        'additional_info'
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
