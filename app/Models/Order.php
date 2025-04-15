<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'address',
        'pic_spot',
        'instructions',
        'delivery_speed_type',
        'detergent_type',
        'is_delicate_cycle',
        'is_hang_dry',
        'is_return_hanger',
        'is_additional_request',
        'coverage_type',

        'invoice_number',
        'order_date',
        'total_amount',
        'status',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

}
