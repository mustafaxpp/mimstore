<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Cart;

class CartComponent extends Component
{
    use WithFileUploads;

    // public $name;


    public function render()
    {
        return view('livewire.cart-component');
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


    // public function add(product $product_id)
    // {
    //     dd($this->product_id);
    //     $product = Product::find($product_id);
    //     if (session()->has('cart')) {
    //         $products =session()->get('cart');
    //         $products->push($product_id);
    //         session()->put('cart', $products);
    //     } else {
    //         $products = collect();
    //         $products->push($product_id);
    //         session()->put('cart', $products);
    //     }
    //     //  return redirect()->back()->back();
    // }

    public function removeFromCart($product_id)
    {

        // dd($product_id);
        // session()->get('cart')->delete($product_id);
        // session()->get('cart')->delete($product_id);
        // session()->forget(['cart', 'product_id']);
        // $product = Product::find($product_id);
        // unset($product[$product_id]);
        // session()->pull('cart');
        // return back();

        //dd($product_id);
        // $products = session()->get('cart');

        // $prod_key =null;
        // foreach($products as $key => $prod){
        //     if ($prod->id == $product_id) {
        //         $prod_key =$key ;
        //         break;
        //     }
        // }
        // if ($prod_key>=0){
        //     $products->forget($prod_key);
        // }
        if (session()->has('cart')) {
            $products = session()->get('cart');
          //  dd( $products);
            if (!empty($products[$product_id]) && $products[$product_id] >1){
                $products[$product_id] -=1;
            }elseif(!empty($products[$product_id]) && $products[$product_id] ==1){
                unset($products[$product_id]);
            }
            // dd($products);
            session()->put('cart', $products);
            $this->emit("refreshCountComponent");
        }
    }

    public function add($id)
    {
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
        }

}
