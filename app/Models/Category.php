<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;



    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function sub_categoires(){
        return $this->hasMany(Category::class , 'category_id' ,'id');
    }

    public function main_category(){
        return $this->belongsTo(Category::class , 'category_id', 'id');
    }
}
