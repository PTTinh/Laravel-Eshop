<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::paginate();
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_cate = ProductCate::all();
        return response()->json($product_cate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->file('img')->guessClientExtension();// lấy đuôi file
        // $request->file('img')->getClientOriginalName(); // lấy tên file
        // $request->file('img')->getSize(); // lấy kích thước file
        // $request->file('img')->getError(); // file lỗi
        // $request->file('img')->isValid(); // kiểm tra file có hợp lệ không
        $this->custom_validate($request);
        $filename = $request->img->getClientOriginalName() . '-' . time() . "." . $request->img->extension(); // tạo tên file
        $request->img->move(public_path('images'), $filename); // chuyển file vào thư mục public/images
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'description' => $request->description,
            'img' => $filename,
            'product_cate_id' => $request->product_cate_id
        ]);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // kiểm tra xem có ảnh mới được chọn không
        if ($request->img) {
            // xóa ảnh cũ
            $product = Product::findOrFail($id);
            $image_path = public_path('images') . '/' . $product->img;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $this->custom_validate($request);
            $filename = $request->img->getClientOriginalName() . '-' . time() . "." . $request->img->extension(); // tạo tên file
            $request->img->move(public_path('images'), $filename); // chuyển file vào thư mục public/images
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'description' => $request->description,
                'img' => $filename,
                'product_cate_id' => $request->product_cate_id
            ]);
        } else {
            $request->validate([
                'name' => 'required|max:250',
                'price' => 'required|numeric|max:20',
                'discount_price' => 'nullable|numeric|max:20',
                'description' => 'nullable|string|max:250',
                'product_cate_id' => 'required'
            ], [
                'name.required' => 'Tên sản phẩm không được để trống',
                'name.max' => 'Tên sản phẩm không được quá 250 ký tự',
                'price.required' => 'Giá sản phẩm không được để trống',
                'price.numeric' => 'Giá sản phẩm phải là số',
                'price.max' => 'Giá sản phẩm không được quá 20 ký tự',
                'description.max' => 'Mô tả không được quá 250 ký tự',
                'description.string' => 'Mô tả phải là chuỗi',
                'discount_price.numeric' => 'Giá khuyến mãi phải là số',
                'discount_price.required' => 'Giá khuyến mãi không được để trống',
                'discount_price.max' => 'Giá khuyến mãi không được quá 20 ký tự',
                'product_cate_id.required' => 'Danh mục sản phẩm không được để trống'
            ]);
            $product = Product::findOrFail($id);
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'description' => $request->description,
                'product_cate_id' => $request->product_cate_id
            ]);
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // xóa ảnh cũ
        $product = Product::findOrFail($id);
        $image_path = public_path('images') . '/' . $product->img;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('product.index');
    }
    private function custom_validate($request)
    {
        $rules = [
            'name' => 'required|max:250',
            'price' => 'required|numeric|max:20',
            'discount_price' => 'nullable|numeric|max:20',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string|max:250',
            'product_cate_id' => 'required'
        ];
        $msg = [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.max' => 'Tên sản phẩm không được quá 250 ký tự',
            'price.required' => 'Giá sản phẩm không được để trống',
            'price.max' => 'Giá sản phẩm không được quá 20 ký tự',
            'discount_price.required' => 'Giá khuyến mãi không được để trống',
            'img.required' => 'Ảnh sản phẩm không được để trống',
            'discount_price.numeric' => 'Giá khuyến mãi phải là số',
            'discount_price.max' => 'Giá khuyến mãi không được quá 20 ký tự',
            'price.numeric' => 'Giá sản phẩm phải là số',
            'img.image' => 'Ảnh sản phẩm phải là ảnh',
            'img.mimes' => 'Ảnh sản phẩm phải có định dạng jpeg, png, jpg, gif, svg',
            'img.max' => 'Ảnh sản phẩm không được quá 2048 KB',
            'description.max' => 'Mô tả không được quá 250 ký tự',
            'description.string' => 'Mô tả phải là chuỗi',
            'product_cate_id.required' => 'Danh mục sản phẩm không được để trống'
        ];
        $request->validate($rules, $msg);
    }
}
