<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketRecommendPlayer extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'slug',
        'expiry_date',
        'for_whom',
        'upload_logo',
        'description',
        'player_age',
        'player_gender',
        'country_id',
        'eu_passport_required',
        'player_main_position',
        'player_alternative_position',
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
