<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['store']]);
    }

    public function index()
    {
        return UserResource::collection(User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreUserRequest $storeUserRequest)
    {
        //
    }

    public function store(StoreUserRequest $storeUserRequest)
    {
        $seed = $storeUserRequest->validated();
        $user = User::query()->create($seed);
        return (new UserResource($user))->additional(['message' => 'success'])->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(UpdateUserRequest $updateUserRequest, User $user)
    {
        $valid_data = $updateUserRequest->validated();
        $user->update($valid_data);
        return (new UserResource($user))->additional(['message' => 'success'])->response()->setStatusCode(Response::HTTP_CREATED);
    }


    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'User deleted successfully.'], Response::HTTP_OK);

    }
}

