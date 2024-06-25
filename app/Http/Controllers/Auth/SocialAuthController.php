<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Something went wrong!');
        }

        // Split the name into first and last names

        // $user = User::where('provider_id', $socialUser->getId())->first();

        $nameParts = explode(' ', $socialUser->getName(), 2);
        $firstName = $nameParts[0];
        $lastName = isset($nameParts[1]) ? $nameParts[1] : '';

        $user = User::where('provider_id', $socialUser->getId())->first();

        if ($user) {
            Auth::login($user, true);
        } else {
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'password' => encrypt('dummyPassword'), // Required field, you can set a dummy password
                'first_name' => $firstName,
                'last_name' => $lastName,
            ]);
            Auth::login($user, true);
        }

        return redirect()->route('home');
    }

    public function findOrCreateUser($providerUser, $provider)
    {
        $user = User::where('provider_id', $providerUser->id)->first();

        if ($user) {
            return $user;
        }

        return User::create([
            'name' => $providerUser->name,
            'email' => $providerUser->email,
            'provider' => $provider,
            'provider_id' => $providerUser->id,
            'password' => '',
        ]);
    }

}