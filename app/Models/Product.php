<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    function order_products(){
        return $this->hasMany(OrderProduct::class, 'product_id', 'id');
    }


    public function orders()
    {
        return $this->belongsToMany(Order::class,OrderProduct::class, 'product_id' , 'order_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
