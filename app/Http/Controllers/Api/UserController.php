<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Log;

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
        return $this->sendPaginatedResponse(UserResource::collection(User::query()->paginate(10)));
    }


    public function store(StoreUserRequest $storeUserRequest)
    {
        $seed = $storeUserRequest->validated();
        try {
            $user = User::query()->create($seed);
            Log::info("Create User: user created successfully with id {$user->id} ");
            return $this->sendResponse(new UserResource($user));
        } catch (\Exception $e) {
            Log::error("Create User : system can not   Create User for this error {$e->getMessage()}");
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     */
    public function show(User $user)
    {
        return $this->sendResponse(new UserResource($user));
    }


    public function update(UpdateUserRequest $updateUserRequest, User $user)
    {
        $valid_data = $updateUserRequest->validated();
        try {
            $user->update($valid_data);
            Log::info("Update User: user updated successfully with id {$user->id} ");
            return $this->sendResponse(new UserResource($user));
        } catch (\Exception $e) {
            Log::error("Update User : system can not update User for this error {$e->getMessage()}");
            return $this->sendError($e->getMessage());
        }

    }


    public function destroy(User $user)
    {
        try {
            $user->delete();
            Log::info("Delete User: user delete successfully with id {$user->id} ");
            return $this->sendResponse('', 'User deleted successfully.');
        } catch (\Exception $e) {
            Log::error("Delete User : system can not  delete User for this error {$e->getMessage()}");
            return $this->sendError($e->getMessage());
        }

    }
}
