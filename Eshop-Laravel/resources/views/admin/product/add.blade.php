@extends('layouts._admin')
@section('title', 'Thêm sản phẩm')
@section('admin-title', 'Thêm sản phẩm')
@section('content')
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="product_cate_id" class="form-label">Chọn Danh Mục Sản Phẩm <span class="text-danger">*</span></label>
            <select name="product_cate_id" id="product_cate_id" class="form-select" required>
                <option value>-- Chọn --</option>
                @foreach($product_cate as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nhập tên sản phẩm <span class="text-danger">*</span></label>
            <input name="name" id="name" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá sản phẩm <span class="text-danger">*</span></label>
            <input name="price" id="price" type="number" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="discount_price" class="form-label">Giá khuyến mãi <span class="text-danger">*</span></label>
            <input name="discount_price" id="discount_price" type="number" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả sản phẩm <span class="text-danger">*</span></label>
            <textarea name="description" id="description" class="form-control" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Ảnh Sản Phẩm <span class="text-danger">*</span></label>
            <input name="img" id="img" type="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection
