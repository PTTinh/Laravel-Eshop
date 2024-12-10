<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Product;
use App\Models\ProductCate;
use Illuminate\Http\Request;

class ProductCateController extends BaseController
{
    /**
     * Hiển thị danh sách tài nguyên.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //paginate() để phân trang măt định 15 phần tử
        $product_cate = ProductCate::paginate();
        return view('admin.product_cate.index', compact('product_cate'));
    }

    /**
     * Hiển thị form để tạo tài nguyên mới.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Lưu trữ tài nguyên mới được tạo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->custom_validate($request);
        $data = $request->all();
        unset($data['_token']);
        $product_cate = new ProductCate($data);
        $product_cate->save();
        return redirect()->route('product_cate.index')->with('success', 'Thêm danh mục thành công');
    }

    /**
     * Hiển thị tài nguyên cụ thể.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        abort(404);
    }

    /**
     * Hiển thị form để chỉnh sửa tài nguyên cụ thể.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $product_cate = DB::table('product_cate')->where('id', $id)->first();
        $product_cate = ProductCate::find($id);
        if(!$product_cate){
            abort(404);
        }
        return response()->json($product_cate);
    }

    /**
     * Cập nhật tài nguyên cụ thể trong lưu trữ.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->custom_validate($request);
        ProductCate::find($id)->update(['name' => $request->name]);
        return redirect()->route('product_cate.index')->with('success', 'Cập nhật danh mục thành công');
    }

    /**
     * Xóa tài nguyên cụ thể khỏi lưu trữ.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // kiểm tra xem danh mục có sản phẩm không
        $count_product = Product::where('product_cate_id', $id)->count();
        if ($count_product > 0) {
            return redirect()->route('product_cate.index')->with('warning', 'Không thể xóa danh mục này vì có sản phẩm thuộc danh mục này');
        }
        ProductCate::destroy($id);
        return redirect()->route('product_cate.index')->with('success', 'Xóa danh mục thành công');
    }

    private function custom_validate($request)
    {
        $rules = [
            'name' => 'required|max:250'
        ];
        $msg = [
            'name.required' => 'Tên danh mục không được để trống',
            'name.max' => 'Tên danh mục không được vượt quá 250 ký tự'
        ];
        return $request->validate($rules, $msg);
    }
}
