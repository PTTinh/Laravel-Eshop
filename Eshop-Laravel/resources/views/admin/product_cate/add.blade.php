@extends('layouts._admin')
@section('title', 'Thêm danh mục sản phẩm')
@section('admin-title', 'Thêm danh mục sản phẩm')
@section('content')
    <form action="{{ route('product_cate.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục">
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection
