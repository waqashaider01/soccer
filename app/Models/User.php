<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'facebook_id',
        'github_id',
        'linkedin_id',
        'type',
        'status',
        'followers',
        'followings',
        'token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scout()
    {
        return $this->hasMany(ScoutInfo::class, 'scout_id');
    }

    public function club()
    {
        return $this->hasMany(ClubInfo::class, 'club_id');
    }

    public function coach()
    {
        return $this->hasMany(CoachInfo::class, 'coach_id');
    }

    public function intermediary()
    {
        return $this->hasMany(IntermediaryInfo::class, 'intermediary_id');
    }

    public function academy()
    {
        return $this->hasMany(AcademyInfo::class, 'academy_id');
    }

    public function marketAcademy()
    {
        return $this->hasMany(MarketAcademy::class, 'agent_id');
    }

    public function marketCamps()
    {
        return $this->hasMany(MarketCampus::class, 'agent_id');
    }

    public function marketClub()
    {
        return $this->hasMany(MarketClub::class, 'agent_id');
    }

    public function playersPortfolio()
    {
        return $this->hasMany(PlayersPortfolio::class, 'player_id');
    }

    public function player()
    {
        return $this->hasMany(PlayerInfo::class, 'player_id');
    }

    public function transferHistory()
    {
        return $this->hasMany(TransferHistory::class, 'player_id');
    }

    public function blog()
    {
        return $this->hasMany(Blog::class, 'user_id');
    }

    public function cv()
    {
        return $this->hasOne(PlayerCV::class, 'player_id');
    }
    public function favorites()
    {
        return $this->hasMany(Favourite::class, 'user_id');
    }

    public function favorites_array()
    {
        return $this->favorites->pluck('fav_id')->toArray();
    }

    public function userprivacy()
    {
        return $this->hasOne(UserPrivacy::class);
    }
}
