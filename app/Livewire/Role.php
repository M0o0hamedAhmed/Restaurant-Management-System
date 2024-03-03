<?php

namespace App\Livewire;

use Livewire\Component;

class Role extends Component
{
    public function render()
    {
        $roles = \Spatie\Permission\Models\Role::query()->get();
        return view('livewire.role',compact('roles'))->title('roles');
    }
}
