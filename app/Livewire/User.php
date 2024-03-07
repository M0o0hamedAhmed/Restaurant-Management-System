<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
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


    public \App\Models\User $user;
    public $editMode = false;


//    #[Rule('required|string|min:5|max:255')]
//    #[Validate]
    public $name = '';


//    #[Rule('required|email')]
    public $email;


//    #[Rule('required|confirmed')]
    public $password = '';


    public $password_confirmation = '';


//    #[Rule('nullable|mimes:jpg,png|between:10,4096|image')]
    public $image = '';


//    #[Rule('required|exists:roles,name')]
    public $multiRole = [];


//    #[Rule('required|unique:users,phone_number')]
    public $phone_number = '';

    public $user_id ='';

    public $search;

    //to reset image
    public $iteration;

    public function mount(\App\Models\User $user)
    {

        $this->user = $user;

    }


    public function rules()
    {
        $storeValidation = [
            'multiRole' => 'required|exists:roles,name',
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'image' => 'nullable',
//            'phone_number' => 'required|unique:users,phone_number|numeric|digits_between:11,15|starts_with:011,012,015,010'
            'phone_number' => 'required'
        ];
        $updateValidation = [
            'multiRole' => 'nullable|exists:roles,name',
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users,email,'.$this->user_id,
            'image' => 'nullable',
            'phone_number' => 'required',
            'user_id' => 'required',
            'password' => 'nullable|confirmed',
        ];

        return $this->editMode ?  $updateValidation : $storeValidation;
    }


    public function updated($fields)
    {
        $this->validateOnly($fields);
    }


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
        $data = $this->validate();
        try {
            if ($this->image) {
                $data['image'] = $this->image->store('users', 'public');
            }
            $data['created_by'] = auth()->user()->getAuthIdentifier();
            $user = UserModel::query()->create($data);
            $user->assignRole($data['multiRole']);
            $this->dispatch('user-created');
            $this->resetPage();
            $this->reset();
            $this->iteration++;
            Log::info("Create User: user created successfully with id {$user->id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            Log::error("Create User : system can not   Create User for this error {$e->getMessage()}");
            abort(500);
        }
    }

    public function update(){
       $data =  $this->validate();
        try {
            $user = \App\Models\User::query()->findOrFail($data['user_id']);
            $user->update($data);
            $user->syncRoles($data['multiRole']);
            $this->dispatch('user-updated');
            Log::info("Update User: user updated successfully with id {$user->id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            Log::error("Update User : system can not   update User for this error {$e->getMessage()}");
            session()->flash('error' , $e->getMessage() );
        }
    }




    #[On('edit-mode')]
    public function edit(UserModel $user)
    {
        $this->editMode=true;
        $this->user = $user;
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->image  = $user->image;
        $this->phone_number  = $user->phone_number;
        $this->multiRole  = $user->roles->pluck('name')->toArray();
    }


    public function placeholder()
    {
        return view('livewire.include.placeholder.placeholder');
    }

    public function render()
    {
        $roles = \Spatie\Permission\Models\Role::query()->get();
        $users = UserModel::query()->where('name', 'like', "%{$this->search}%")->latest()->paginate();
        return view('livewire.user', compact('users', 'roles'));
    }
}
