<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AuthRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends BaseController
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(AuthRequest $request)
    {
            $credentials = $request->validated();
        try {
            if (! $token = auth('api')->attempt($credentials)) {
                return $this->sendError('Unauthorized');
            }
            Log::info("Log in : Logged in Successfully by  user id ".Auth::id());
            return $this->sendResponse($this->respondWithToken($token)->getData(),'Successfully logged in');
        }catch (\Exception $e){
            Log::info("Login : System can not  Logged in For this error {$e->getMessage()}");
            return  $this->sendError($e->getMessage());
        }


    }


    public function me()
    {
        return $this->sendResponse(new UserResource(auth()->user()));
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

       return $this->sendResponse('','Successfully logged out');

    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
      return  $this->sendResponse($this->respondWithToken(auth()->refresh()),'Successfully logged out');

    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 6000000
        ]);
    }
}
