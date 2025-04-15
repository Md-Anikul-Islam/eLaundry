<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'payment_method',
        'card_no',
        'card_security_code',
        'country',
        'zip_code',
        'payment_date',
        'delivery_charge',
        'total_amount',
        'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
