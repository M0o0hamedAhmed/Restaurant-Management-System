<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $classView;

    public function __construct()
    {
        $this->classView = 'admin.role.';
        $this->middleware(['can:view roles'])->only('index', 'show');
        $this->middleware(['can:edit roles'])->only('edit', 'update');
        $this->middleware(['can:create roles'])->only('create', 'store');
        $this->middleware(['can:delete roles'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $roles = Role::query()->get();
        return view($this->classView . 'index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view($this->classView . 'create',compact('permissions'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $data = $request->validated();
        try {
            $role = Role::query()->create($data);
            Log::info("Create Role: role created successfully with id {$role->id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            Log::error("Create Role : system can not   create role for this error {$e->getMessage()}");
            abort(500);
        }


        return redirect()->route('roles.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view($this->classView . 'edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $data = $request->validated();
        try {
            $role->syncPermissions($data['permissions']);
            Log::info("Update Role: role updated successfully with id {$role->id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        }catch (\Exception $e){
            Log::error("Update Role : system can not   updated role for this error {$e->getMessage()}");
            abort(500);
        }


        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Role::query()->whereId($id)->delete();
            Log::info("Delete Role: role deleted successfully with id {$id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        }catch (\Exception $e){
            Log::error("Delete Role : system can not   Delete role for this error {$e->getMessage()}");
            abort(500);
        }

        return redirect()->route('roles.index');

    }
}
