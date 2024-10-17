@extends('layouts._admin')
@section('title', 'Sửa danh mục sản phẩm')
@section('admin-title', 'Sửa danh mục sản phẩm')
@section('content')
    <form action="{{ route('product_cate.update',  $product_cate->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục" value="{{$product_cate->name}}">
        </div>
        <button type="submit" class="btn btn-primary">Sửa</button>

    </form>
@endsection
