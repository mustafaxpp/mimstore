<?php

namespace App\Http\Livewire;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class SupplierComponent extends Component
{
    use WithPagination;

    public $name;
    public $number;
    public $phone;
    public $email;
    public $supplier_id;

    protected $rules = [
        'name' => 'required|min:2',
        'number' => 'required|min:10',
        'phone' => 'nullable|max:10',
        'email' => 'required',
    ];

    public function render()
    {

        return view('livewire.supplier-component');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        if($this->supplier_id){
            $supplier = Supplier::find($this->supplier_id);
        }else{
            $supplier = new Supplier();
        }

        $supplier->name = $this->name;
        $supplier->number = $this->number;
        $supplier->phone = $this->phone;
        $supplier->email = $this->email;
        $supplier->save();
        $this->cleare();


    }
    public function edit($supplier_id)
    {

        $supplier = Supplier::find($supplier_id);

        $this->supplier_id = $supplier->id;
        $this->name = $supplier->name;
        $this->number = $supplier->number;
        $this->phone = $supplier->phone;
        $this->email = $supplier->email;
    }
    public function delete($supplier_id)
    {

        Supplier::destroy($supplier_id);

    }

    public function cleare()
    {
        $this->name = null ;
        $this->number = null ;
        $this->phone = null ;
        $this->email = null ;
    }
}
