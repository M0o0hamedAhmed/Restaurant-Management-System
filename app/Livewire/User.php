<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use \App\Models\User as UserModel;

#[Title('Users')]
#[Layout('components.layouts.app')]
class User extends Component
{
    use WithPagination;
    use WithFileUploads;

    #[Rule('required|string|max:255')]
    public $name;


    #[Rule('required|email|unique:users')]
    public $email;


    #[Rule('required|confirmed')]
    public $password;


    public $password_confirmation;


    #[Rule('nullable|mimes:jpg,png|between:10,4096|image')]
    public $image;


    #[Rule('required|exists:roles,name')]
    public $role;


    #[Rule('required|unique:users,phone_number')]
    public $phone_number;

    public $search;


    public function delete($user_id)
    {
        $user = UserModel::query()->withTrashed()->findOrFail($user_id);
        $user->forceDelete();
        $this->resetPage();
    }


    public function archive()
    {
        $this->user->delete();
    }

    public function store()
    {
        $this->validate();
        $data = $this->validate();
        try {
            if ($this->image) {
                $data['image'] = $this->image->store('users', 'public');
            }
            $data['created_by'] = auth()->user()->getAuthIdentifier();
            $user = \App\Models\User::query()->create($data);
            $user->assignRole($data['role']);
            $this->reset();
            Log::info("Create User: user created successfully with id {$user->id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            Log::error("Create User : system can not   Create User for this error {$e->getMessage()}");
            abort(500);
        }
    }


    public function placeholder()
    {
        return view('livewire.include.placeholder.placeholder');
    }
    public function render()
    {
        sleep(2);
        $roles = \Spatie\Permission\Models\Role::query()->get();
        $users = UserModel::query()->where('name', 'like', "%{$this->search}%")->withTrashed()->get();
        return view('livewire.user', compact('users', 'roles'));
    }
}
