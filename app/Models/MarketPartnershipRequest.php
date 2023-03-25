<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketPartnershipRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'slug',
        'expiry_date',
        'for_whom',
        'upload_logo',
        'description',
        'originating_partner_country',
        'prospective_partner',
        'prospective_partner_country',
        'prospective_partner_country_wordwide',
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

    public function originatingCountry()
    {
        return $this->belongsTo(Country::class, 'originating_partner_country');
    }

    public function prospectiveCountry()
    {
        return $this->belongsTo(Country::class, 'prospective_partner_country');
    }

    public function incrementReadCount()
    {
        $this->reads++;
        return $this->save();
    }
}
