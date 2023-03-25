<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingAdress extends Model
{
    use HasFactory;

    protected $table = 'billing_address';

    protected $fillable = [
        'user_id',
        'subscription_id',
        'postal_code',
        'city',
        'state',
        'country',
    ];
}

