<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{

    public function __construct()
    {
        $this->middleware(['can:view users'])->only('index','show');
        $this->middleware(['can:edit users'])->only('edit','update');
        $this->middleware(['can:create users'])->only('create','store');
        $this->middleware(['can:delete users'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['users'] = User::query()->get();

        return view('admin.user.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest   $request)
    {

        $data = $request->validated();
        $data['created_by'] = auth()->user()->getAuthIdentifier();
        User::query()->create($data);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(User $user)
    {
        $this->data['user'] =$user;
        return view('admin.user.edit',$this->data);

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest   $request, string $id)
    {
        $data = $request->validated();
        User::query()->whereKey($id)->update($data);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
       $user->delete();
        return redirect()->route('users.index');
    }
}
