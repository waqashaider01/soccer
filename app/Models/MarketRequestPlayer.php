<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketRequestPlayer extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'slug',
        'expiry_date',
        'for_whom',
        'upload_logo',
        'description',
        'league_division',
        'country_id',
        'player_gender',
        'player_position',
        'player_min_age',
        'player_max_age',
        'eu_passport_required',
        'transfer_fee',
        'monthly_salary',
        'training_compensation_fee',
        'trial_conditions',
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
