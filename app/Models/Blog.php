<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'image', 'title', 'description', 'status', 'reads'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function incrementReadCount()
    {
        $this->reads++;
        return $this->save();
    }
}
