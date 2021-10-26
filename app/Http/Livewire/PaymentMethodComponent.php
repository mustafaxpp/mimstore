<?php

namespace App\Http\Livewire;

use App\Models\PaymentMethod;
use Livewire\Component;
use Livewire\WithPagination;

class PaymentMethodComponent extends Component
{
    use WithPagination;

    public $name;
    public $discreption;
    public $payment_id;

    protected $rules = [
        'name' => 'required|min:2',
        'discreption' => 'required',
    ];
    public function render()
    {
        return view('livewire.payment-method-component');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        if ($this->payment_id){
            $payment = PaymentMethod::find($this->payment_id);
        }else{
            $payment = new PaymentMethod();

        }

        $payment->name = $this->name;
        $payment->discreption = $this->discreption;
        $payment->save();
        $this->cleare();
    }

    public function edit($payment_id)
    {
        $payment = PaymentMethod::find($payment_id);

        $this->payment_id = $payment->id;
        $this->name = $payment->name;
        $this->discreption = $payment->discreption;
    }

    public function delete($payment_id)
    {
        PaymentMethod::destroy($payment_id);
    }

    public function cleare()
    {
        $this->payment_id = null ;
        $this->name = null ;
        $this->discreption = null ;
    }
}
