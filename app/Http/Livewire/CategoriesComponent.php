<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoriesComponent extends Component
{

    public $name , $category_id , $main_id;

    protected $rules = [
        'name' => 'string',
        'category_id' => 'nullable',
    ];

    public function render()
    {
        return view('livewire.categories-component');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        if ($this->main_id)
            $cat = Category::find($this->main_id);
        else {
            $cat = new Category();
        }

        $cat->name = $this->name;
        $cat->category_id = $this->category_id;
        $cat->save();
    }

    function delete($main_id)
    {
        Category::destroy($main_id);
    }

    function edit($main_id)
    {
        $cat = Category::find($main_id);
        $this->main_id = $cat->id;
        $this->name = $cat->name;
        $this->category_id = $cat->category_id ;
    }
}


