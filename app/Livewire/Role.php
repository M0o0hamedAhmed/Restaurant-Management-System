<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Role extends Component
{


    #[On('permission-created')]
    public function updateList($permission =  null)
    {

    }

    public function render()
    {
        $permissions = \Spatie\Permission\Models\Permission::query()->get();
        $roles = \Spatie\Permission\Models\Role::query()->get();
        return view('livewire.role', compact('roles', 'permissions'))->title('roles');
    }
}
