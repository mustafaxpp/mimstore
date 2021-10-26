<?php

namespace App\Http\Livewire;

use App\Models\Stock;
use Livewire\Component;

class StocksComponent extends Component
{

    public $name , $count , $stock_id;

    protected $rules = [
        'name' => 'string',
        'count' => 'required|NUMERIC',
    ];

    public function render()
    {
        return view('livewire.stocks-component');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        if ($this->stock_id)
            $stock = Stock::find($this->stock_id);
        else {
            $stock = new Stock();
        }

        $stock->name = $this->name;
        $stock->count = $this->count;
        $stock->save();
    }

    function delete($stock_id)
    {
        Stock::destroy($stock_id);
    }

    function edit($stock_id)
    {
        $stock = Stock::find($stock_id);
        $this->stock_id = $stock->id;
        $this->name = $stock->name;
        $this->count = $stock->count;
    }
}
