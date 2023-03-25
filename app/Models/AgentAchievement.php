<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentAchievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'achievements',
        'month',
        'year',
        'details',
        'country_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "agent_id");
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
