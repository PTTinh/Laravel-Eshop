<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isNull;

class CartController extends Controller
{
    public function index()
    {
        $carts = Session::get('carts', []);
        $products = Product::find(array_keys($carts));
        return view('cart')
            ->with('products', $products)
            ->with('carts', $carts);
    }
    public function addToCart(int $id)
    {
        //kiểm tra xem sản phẩm có tồn tại không
        $carts = Session::get('carts', []);

        if(array_key_exists($id, $carts)){
            $carts[$id]++;
            Session::put('carts', $carts);
        }else{
            $carts[$id] = 1;
            Session::put('carts', $carts);
        }
        return redirect()->back();
    }
}
