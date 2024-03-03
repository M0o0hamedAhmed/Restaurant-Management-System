<?php

namespace App\Livewire;

use Livewire\Component;

class MenuItem extends Component
{
    public function render()
    {
        $menu_items = \App\Models\MenuItem::query()->get();
        return view('livewire.menu-item',compact('menu_items'))->title('menu_items');
    }
}
