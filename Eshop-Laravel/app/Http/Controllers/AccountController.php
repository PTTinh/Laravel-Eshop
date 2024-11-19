<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function register()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('account.register');
    }
    public function registerPost(Request $request)
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
        return redirect()->route('login')->with('success', 'Đăng ký thành công');
    }
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('account.login');
    }
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->route('product_cate.index');
        }
        return redirect()->route('login')->with('error', 'Đăng nhập thất bại');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
