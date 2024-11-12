<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function resister()
    {
        return view('account.resister');
    }
    public function login()
    {
        return view('account.login');
    }
    public function resisterPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'cf-password' => 'required|same:password'
        ]);

        $data = $request->only('name', 'email', 'password');
        $data['password'] = Hash::make($data['password']);
        $user = new User($data);
        $user->save();
        return redirect()->route('resister')->with('success', 'Đăng ký thành công');
    }

    public function loginPost(Request $request)
    {
    }

    public function logout()
    {
       
    }
}
