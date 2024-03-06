<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $user_provider = Socialite::driver($provider)->stateless()->user();
            $user = User::query()->where('provider', $provider)->where('provider_id', $user_provider->id)->first();

            if (!$user) {
                $data = [
                    'name' => $user_provider->name.'update',
                    'email' => $user_provider->email,
                    'password' => Hash::make(Str::random(8)),
                    'provider' => $provider,
                    'provider_id' => $user_provider->id,
                    'provider_token' => $user_provider->token
                ];
                $user = User::query()->updateOrCreate(['email'=>$user_provider->email],$data);
            }
            Auth::login($user);
            Log::info(" Login User : user logged in by id : {$user->id}");
            return Redirect::route('dashboard');
        } catch (\Exception $e) {
            Log::error("User Login: system can not logged in for this error :{$e->getMessage()}");
            Redirect::route('login')->withErrors([
                'email' => $e->getMessage()
            ]);

        }
    }
}
