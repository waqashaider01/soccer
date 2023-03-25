<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuardianApproval extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'gurdian_email',
        'status',
        'photofront',
        'photoback',
    ];

    public function player()
    {
        return $this->belongsTo(User::class, 'player_id');
    }
}
