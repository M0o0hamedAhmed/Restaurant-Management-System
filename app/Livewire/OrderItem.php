<?php

namespace App\Livewire;

use Livewire\Component;

class OrderItem extends Component
{
    public function render()
    {
        return view('livewire.order-item')->title('order-items');
    }
}
