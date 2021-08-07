<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function showFormLogin()
    {
        return view('admin.login');
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
        return view('admin.register',compact('roles'));
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
}
