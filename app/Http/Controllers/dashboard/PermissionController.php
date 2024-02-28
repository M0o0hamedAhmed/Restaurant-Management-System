<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    private $classView;

    public function __construct()
    {
        $this->classView = 'admin.permission.';
        $this->middleware(['can:view permissions'])->only('index', 'show');
        $this->middleware(['can:edit permissions'])->only('edit', 'update');
        $this->middleware(['can:create permissions'])->only('create', 'store');
        $this->middleware(['can:delete permissions'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $permissions = Permission::query()->get();
        return view($this->classView . 'index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->classView . 'create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request)
    {
        $data = $request->validated();
        try {
            $permission = Permission::query()->create($data);
            Log::info("Create Permission: permission created successfully with id {$permission->id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            Log::error("Create Permission : system can not   create permission for this error {$e->getMessage()}");
            abort(500);
        }


        return redirect()->route('permissions.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view($this->classView . 'edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, string $id)
    {
        $data = $request->validated();

        try {
            Permission::query()->whereId($id)->update($data);
            Log::info("Update Permission: permission updated successfully with id {$id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        }catch (\Exception $e){
            Log::error("Update Permission : system can not   updated permission for this error {$e->getMessage()}");
            abort(500);
        }


        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Permission::query()->whereId($id)->delete();
            Log::info("Delete Permission: permission deleted successfully with id {$id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        }catch (\Exception $e){
            Log::error("Delete Permission : system can not   Delete permission for this error {$e->getMessage()}");
            abort(500);
        }

        return redirect()->route('permissions.index');

    }
}
