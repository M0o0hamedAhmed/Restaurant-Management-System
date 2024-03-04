<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission as PermissionModel;


class Permission extends Component
{
    use WithPagination;


    #[Rule('required|min:3|max:30|unique:permissions,name', as: 'ya permission name 👀')]
    public $name;

    public $editingPermissionId;

    #[Rule('required|min:3|max:30')]
    public $editingPermissionName;


    public $search;


    public function store()
    {
        $this->validateOnly('name');
        try {
            $permission = PermissionModel::query()->create($this->validateOnly('name'));
            $this->reset();
            session()->flash('success', 'created');
            $this->dispatch('permission-created',$permission);
            $this->resetPage();
            Log::info("Create Permission: permission created successfully with id {$permission->id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            Log::error("Create Permission : system can not   create permission for this error {$e->getMessage()}");
            abort(500);
        }

    }


    public function edit(PermissionModel $permission)
    {
        $this->editingPermissionId = $permission->id;
        $this->editingPermissionName = $permission->name;
    }

    public function update(PermissionModel $permission)
    {
        sleep(1);

        try {
            $this->validateOnly('editingCategoryName');
            $permission->update(['name' => $this->editingPermissionName]);
            session()->flash('success_update', 'updated');
            $this->cancelEdit();
            Log::info("Update Permission: permission updated successfully with id {$permission->id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            Log::error("Update Permission : system can not   updated permission for this error {$e->getMessage()}");
            abort(500);
        }

    }

    public function delete(PermissionModel $permission)
    {
        try {
            $permission->delete();
            Log::info("Delete Permission: permission deleted successfully with id {$permission->id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            Log::error("Delete Permission : system can not   Delete permission for this error {$e->getMessage()}");
            abort(500);
        }

    }

    public function cancelEdit()
    {
        $this->reset('editingPermissionId', 'editingPermissionName');
    }

    public function render()
    {
        $permissions = PermissionModel::query()->latest()->where('name', 'like', "%{$this->search}%")->paginate(10);
        return view('livewire.permission', compact('permissions'))->title('permissions');
    }
}
