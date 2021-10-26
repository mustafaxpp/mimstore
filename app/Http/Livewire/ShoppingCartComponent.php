<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShoppingCartComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $product_id;

    public function render()
    {
        $products = Product::all();
        // return view('livewire.shopping-cart-component' , ["products"=>$products]);
        return view('livewire.shopping-cart-component' , ["products"=>$products]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // public function removeFromCart($productId): void
    // {
    //     CartFacade::remove($productId);
    //     $this->cart = CartFacade::get();
    //     $this->emit('productRemoved');
    // }

    // public function checkout(): void
    // {
    //     CartFacade::clear();
    //     $this->emit('clearCart');
    //     $this->cart = CartFacade::get();
    // }


public function add( $id)
{

    // with out Quntity
    // if(session()->has('cart')){
    //     $products =session()->get('cart');
    //     $products->push($id);
    //     session()->put('cart' , $products);
    //    }
    //    else{
    //    $products = collect();
    //    $products->push($id);
    //    session()->put('cart' , $products);
    //    }

    if(session()->has('cart')){
        $products =session()->get('cart');
        if (empty($products[$id])){
            $products[$id] = 1;
        }else{
            $products[$id] += 1;
        }
        session()->put('cart' , $products);
       }
       else{
       $products[$id] = 1;
       session()->put('cart' , $products);
       }
       $this->emit("refreshCountComponent");

    // $product = Product::find($id);
    // $cart = session()->get('cart');
    // if(session()->has('cart')) {
    //     $cart[$id] = [
    //         'id'=>$product->id,
    //         "name" => $product->name,
    //         "qty" => 0,
    //         "price" => $product->price,
    //         "image" => $product->image
    //     ];
    //     foreach ($cart as $id => $val) {
    //         // dd($val['id']);
    //         if ($id == $val['id']) {
    //            $cart[$id]['qty'] +=1;
    //         }
    //     }
    //     // $cart->push($cart[$id]);
    //     session()->put('cart', $cart);
    // }
    // else{
    //     $cart = [
    //         $id => [
    //             'id'=>$product->id,
    //             "name" => $product->name,
    //             "qty" => 1,
    //             "price" => $product->price,
    //             "image" => $product->image
    //         ]
    // ];
    // }
    // session()->put('cart', $cart);
}





}
