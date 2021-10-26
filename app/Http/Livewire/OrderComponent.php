<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderComponent extends Component
{
    use WithPagination;

    public $name;
    public $status;
    public $address;
    public $shippind_price;
    public $details;
    public $mobile;
    public $phone;
    public $order_price;
    public $order_id;

    protected $listeners = ['refresh'=>'$refresh'];
    protected $rules = [
        'name' => 'required|min:3',
        'details' => 'required',
        'address' => 'required',
        'shippind_price' => 'required',
        'mobile' => 'required|min:11|max:11',
        'phone' => 'nullable',
        'order_price' => 'nullable',
    ];
    public function render()
    {
        return view('livewire.order-component');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        // dd($this->name);
        $this->validate();

        if ($this->order_id){
            $order = Order::find($this->order_id);
        }else{

            $order = new Order();
        }
        $order->name = $this->name;
        $order->details = $this->details;
        $order->address = $this->address;
        $order->shippind_price = $this->shippind_price;
        $order->order_price = $this->order_price;
        $order->mobile = $this->mobile;
        $order->created_by = auth()->user()->id;
        if($this->status){
            $order->status = $this->status;
        }
        $order->phone = $this->phone;
        $order->save();
        if ($this->order_id) {
            session()->flash('message', 'تم تعديل الاوردر');
            session()->flash('class', 'success');
        }else{
            session()->flash('message', 'تم اضافة الاوردر');
            session()->flash('class', 'success');
        }
        $this->clear();
    }

    public function edit($order_id)
    {
        $order = Order::find($order_id);

        $this->order_id = $order->id;
        $this->name = $order->name;
        $this->address = $order->address;
        $this->shippind_price = $order->shippind_price;
        $this->order_price = $order->order_price;
        $this->details = $order->details;
        $this->status = $order->status;
        $this->mobile = $order->mobile;
        $this->phone = $order->phone;
    }

    public function delete($order_id)
    {
        Order::destroy($order_id);
        session()->flash('message', 'تمت حذف الاوردر');
        session()->flash('class', 'danger');


    }

    public function clear()
    {
        $this->name = null ;
        $this->details = null ;
        $this->address = null ;
        $this->shippind_price = null ;
        $this->order_price = null ;
        $this->mobile = null ;
        $this->status = null ;
        $this->phone = null ;
    }
}
