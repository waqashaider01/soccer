<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table = "subscriptions";

    protected $fillable = [
        'user_id',
        'name',
        'stripe_id',
        'stripe_status',
        'stripe_plan',
        'quantity',
        'one_payment_of',
        'paid_amount',
        'recurring_amount',
        'trial_ends_at',
        'ends_at',
    ];

    public function billing_address()
    {
        return $this->hasOne(BillingAdress::class,'subscription_id','id');
    }
}
