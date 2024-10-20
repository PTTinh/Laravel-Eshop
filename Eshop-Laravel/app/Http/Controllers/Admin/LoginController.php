<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display the login form.
     */
    public function index()
    {
        return view('admin.users.login');
    }

    /**
     * Handle the login request.
     */
    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        //Kiểm tra thông tin đăng nhập
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('product_cate.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Log the user out.
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
