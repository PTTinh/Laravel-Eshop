<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BaseController extends Controller
{
    public function __construct()
    {
        if(Auth::check()==false){
            Redirect::route('login')->send();
        }
        if(Auth::user()->role==0){
           abort(403);
        }
    }
}
