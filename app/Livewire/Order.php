<?php

namespace App\Livewire;

use Livewire\Component;

class Order extends Component
{

    public $status;

    public function mount(){
        $this->status = request()->query('status', 'pending');
    }
    public function render()
    {
        $orders = \App\Models\Order::query()->where('status',$this->status)->get();
        return view('livewire.order',compact('orders'))->title('orders');
    }
}
