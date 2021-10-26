<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function shipping_company()
    {
        return $this->belongsTo(ShippingCompany::class);
    }


    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function created_by_user()
    {
        return $this->belongsTo(User::class);
    }

    function order_products()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }


    public function products()
    {
        return $this->belongsToMany(Product::class, OrderProduct::class, 'order_id', 'product_id');
    }
}
