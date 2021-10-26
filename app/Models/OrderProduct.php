<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Order;

class OrderProduct extends Model
{
    use HasFactory;




    function order(){
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }


}
