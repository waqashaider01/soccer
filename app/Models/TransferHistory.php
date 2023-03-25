<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'player_id',
        'date',
        'club_from',
        'club_to',
        'transfer_type'
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function playerInfo()
    {
        return $this->belongsTo(PlayerInfo::class, 'player_id');
    }

    public function player()
    {
        return $this->belongsTo(User::class, 'player_id');
    }
}
