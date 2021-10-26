<?php

namespace App\Http\Livewire;

use App\Models\ShippingCompany;
use Livewire\Component;
use Livewire\WithPagination;

class ShippingCompaniesComponent extends Component
{
    use WithPagination;

    public $name;
    public $number;
    public $fees;
    public $company_id;

    protected $rules = [
        'name' => 'required|min:2',
        'number' => 'required|min:10',
        'fees' => 'required',
    ];

    public function render()
    {
        return view('livewire.shipping-companies-component');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        if ($this->company_id){
            $company = ShippingCompany::find($this->company_id);
        }else{
            $company = new ShippingCompany();

        }

        $company->name = $this->name;
        $company->number = $this->number;
        $company->fees = $this->fees;
        $company->save();
        $this->cleare();
    }

    public function edit($company_id)
    {
        $company = ShippingCompany::find($company_id);

        $this->company_id = $company->id;
        $this->name = $company->name;
        $this->number = $company->number;
        $this->fees = $company->fees;
    }

    public function delete($company_id)
    {
        ShippingCompany::destroy($company_id);
    }

    public function cleare()
    {
        $this->company_id = null ;
        $this->name = null ;
        $this->number = null ;
        $this->fees = null ;
    }
}
