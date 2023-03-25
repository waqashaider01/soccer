<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
    ];

    public function player()
    {
        return $this->hasOne(PlayerInfo::class, "birth_country");
    }

    public function scout()
    {
        return $this->hasOne(ScoutInfo::class, "birth_country");
    }
}
