<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCardInfo extends Model
{
    use HasFactory;

    protected $table = 'paymentcard_infos_tables';

    protected $fillable = [
        'user_id',
        'card_no',
        'cvc',
        'expiry_month',
        'expiry_year',
        'card_name'
    ];
}
