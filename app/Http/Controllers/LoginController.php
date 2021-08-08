<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    function showFormLogin()
    {
        return view('backends.admin.login');
    }

    function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $data = [
            'email' => $email,
            'password' => $password
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('users.index');
        } else {
            session()->flash('login_error', 'account not exist!');
            return redirect()->route('login');
        }

    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    function showFormRegister()
    {
        $roles = Role::all();
        return view('backends.admin.register', compact('roles'));
    }

    function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->roles()->sync($request->roles);
        return redirect()->route('login');
    }

    function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->registerOrLogin($user);
        return redirect()->route('users.index');

    }

    protected function registerOrLogin($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->save();
        }
        Auth::login($user);
    }
}
