<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsComponent extends Component
{

    use WithFileUploads;

    public $product_id;
    public $name;
    public $price;
    public $image;
    public $brand_id;
    public $category_id;
    public $stock_id;


    protected $rules = [
        'name' => 'required|max:55',
        // 'price' => 'decimal',
        'image' => 'image|max:1024',
        'brand_id' => 'nullable',
        'category_id' => 'nullable',
        'stock_id' => 'nullable',
    ];

    public function render()
    {
        return view('livewire.products-component');
    }

    public function save()
    {
        $this->validate();

        $photo = $this->image->store('photo_products');

        if ($this->product_id)
            $product = Product::find($this->product_id);
        else {
            $product = new Product();
        }

        $product->name = $this->name;
        $product->image = $photo;
        $product->price = $this->price;
        $product->category_id = $this->category_id;
        $product->brand_id = $this->brand_id;
        $product->stock_id = $this->stock_id;
        $this->clear();
        $product->save();
    }

    public function clear()
    {
        $this->name = null ;
        $this->image = null ;
        $this->photo = null ;
        $this->category_id = null ;
        $this->price = null ;
        $this->brand_id = null ;
        $this->stock_id = null ;
    }

    function delete($product_id)
    {
        Product::destroy($product_id);
    }

    function edit($product_id)
    {
        $product = Product::find($product_id);
        $this->product_id = $product_id;
        $this->name = $product->name;
        $this->price =  $product->price;
        $this->image = $product->image;
        $this->stock_id = $product->stock_id;
        $this->category_id = $product->category_id;
        $this->brand_id = $product->brand_id;
    }
}
