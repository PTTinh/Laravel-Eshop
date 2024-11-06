@extends('layouts._admin')
@section('title', 'Danh sách danh mục sản phẩm')
@section('admin-title', 'Danh sách danh mục sản phẩm')
@section('content')
    <a href="#" class="btn btn-primary" data-bs-target="#AddModal1" data-bs-toggle="modal">Thêm Danh Mục</a>
    <table class="table table-striped">
        <colgroup>
            <col style="width: 5%;" />
            <col style="width: 80%;" />
            <col style="width: 15%;" />
        </colgroup>
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Tên Danh Mục</th>
                <th>Tùy biến</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product_cate as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>
                        <form action="{{ route('product_cate.destroy', $value->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="#" 
                                data-id="{{ $value->id }}"
                                data-urlGet="{{ route('product_cate.edit', $value->id) }}"
                                data-urlPut="{{ route('product_cate.update', $value->id) }}"
                                class="btn btn-success btn-sm js-edit">Sửa</a>
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Xác nhận xóa')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="AddModal1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Thêm Danh Mục</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('product_cate.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nhập tên danh mục">
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="AddModal2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Sửa Danh Mục</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="fUpdate" action="#" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" id="name-update" name="name"
                                placeholder="Nhập tên danh mục" value="">
                        </div>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{ $product_cate->links() }}
@endsection
@section('script')
    <script src="{{ asset('js/product-cate.js') }}"></script>
@endsection