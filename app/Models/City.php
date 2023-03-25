<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;
    protected $fillable=[
        "name",
        "country_id"
    ];
    public function coutry()
    {
        return $this->hasOne(Country::class,"id","country_id");
    }
}
