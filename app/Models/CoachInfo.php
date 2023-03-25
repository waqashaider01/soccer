<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach_id',
        'nationality',
        'licensed',
        'current_team',
        'about_me',
        'organization_name',
        'position_at_organization',
        'coach_nationality',
        'countries_of_operation',
        'countries_of_operation_worldwide',
        'profile_link',
        'profile_type',
        'telephone',
        'email',
        'social_media_link_1',
        'social_media_link_2',
        'social_media_link_3',
        'website',
        'birth_city',
        'state',
        'birth_country',
        'cover_img',
        'profile_img',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'coach_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'birth_country');
    }

    public function incrementReadCount()
    {
        $this->reads++;
        return $this->save();
    }
}
