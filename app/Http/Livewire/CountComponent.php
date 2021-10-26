<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CountComponent extends Component
{

    //refreshCountComponent
    // protected $listeners = ['refreshCountComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.count-component');
    }

    // public function add(product $product_id){

    //     // dd($product_id);
    //     $product = Product::find($product_id);
    //     // dd($product->id);
    //        if(session()->has('cart')){
    //            $products =session()->get('cart');
    //            $products->push($product);
    //            session()->put('cart' , $products);
    //        }
    //        else{
    //            $products = collect();
    //            $products->push($product);
    //            session()->put('cart' , $products);
    //        }
    //     //    dd($products);
    //     //  return redirect()->back()->back();
    // }
}
