<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class BrandComponent extends Component
{

    use WithFileUploads;

    public $name ;
    public $logo ;
    public $brand_id;

    protected $rules = [
        'name' => 'required|max:25',
        'logo' => 'image|max:1024',
    ];

    public function render()
    {
        return view('livewire.brand-component');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $photo = $this->logo->store('photo_brands' , "public");

        if ($this->brand_id)
            $brand = Brand::find($this->brand_id);
        else {
            $brand = new Brand();
        }

        $brand->name = $this->name;
        $brand->logo = $photo;
        $brand->save();
    }

    function delete($brand_id)
    {
        Brand::destroy($brand_id);
    }

    function edit($brand_id)
    {
        $brand = Brand::find($brand_id);
        $this->brand_id = $brand->id;
        $this->name = $brand->name;
        $this->logo = $brand->logo;
    }
}
