<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }
    public function add(Request $request)
    {
       
    }
    public function del(Request $request)
    {
        
    }
}
