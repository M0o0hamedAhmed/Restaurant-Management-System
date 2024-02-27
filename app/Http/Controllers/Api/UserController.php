<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Response;

class UserController extends BaseController
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
        return UserResource::collection(User::query()->paginate(10));
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
        return (new UserResource($user))->additional(['message' => 'success','status' => true])->response()->setStatusCode(Response::HTTP_CREATED);
    }


    public function update(UpdateUserRequest $updateUserRequest, User $user)
    {
        $valid_data = $updateUserRequest->validated();
        $user->update($valid_data);
        return (new UserResource($user))->additional(['message' => 'success','status' => true])->response()->setStatusCode(Response::HTTP_CREATED);
    }


    public function destroy(User $user)
    {
        $user->delete();
        return  $this->sendResponse('','User deleted successfully.');

    }
}

