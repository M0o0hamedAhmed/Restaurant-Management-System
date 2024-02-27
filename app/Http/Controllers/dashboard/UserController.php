<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private $classView;

    public function __construct()
    {
        $this->classView = 'admin.user.';

        $this->middleware(['can:view users'])->only('index', 'show');
        $this->middleware(['can:edit users'])->only('edit', 'update');
        $this->middleware(['can:create users'])->only('create', 'store');
        $this->middleware(['can:delete users'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->paginate(10);

        return view($this->classView . 'index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        return view($this->classView . 'create', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        $data = $request->validated();
        try {
            $data['created_by'] = auth()->user()->getAuthIdentifier();
            $user = User::query()->create($data);
            $user->assignRole($request->roles);
            Log::info("Create User: user created successfully with id {$user->id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            Log::error("Create User : system can not   Create User for this error {$e->getMessage()}");

            abort(500);
        }
        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(User $user)
    {
        $roles = Role::all();
        return view($this->classView . 'edit', compact('user', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $user = User::query()->findOrFail($id);
            $user->update($data);
            $user->syncRoles($request->roles);
            Log::info("Update User: user updated successfully with id {$id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            Log::error("Update User : system can not   update User for this error {$e->getMessage()}");
            abort(500);
        }
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            Log::info("Delete User: user delete successfully with id {$user->id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        }catch (\Exception $e){
            Log::error("Delete User : system can not  delete User for this error {$e->getMessage()}");
            abort(500);
        }
        return redirect()->route('users.index');
    }
}
