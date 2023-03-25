<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlayerInfo extends Model
{
    use HasFactory;


    // public function user()
    // {
    //     return $this->hasOne(User::class, "id", "player_id");
    // }

    public function user()
    {
        return $this->belongsTo(User::class,  "player_id", 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'citizenship_country');
    }

    public function incrementReadCount()
    {
        $this->reads++;
        return $this->save();
    }
}
