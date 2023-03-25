<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketCampus extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'slug',
        'expiry_date',
        'for_whom',
        'upload_logo',
        'description',
        'city_id',
        'country_id',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'player_gender',
        'player_position',
        'player_min_age',
        'player_max_age',
        'profile_type',
        'telephone',
        'email',
        'website',
        'social_media_link',
        'additional_information'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function incrementReadCount()
    {
        $this->reads++;
        return $this->save();
    }
}
