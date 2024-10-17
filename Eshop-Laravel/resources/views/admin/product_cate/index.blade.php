@extends('layouts._admin')
@section('title', 'Danh sách danh mục sản phẩm')
@section('admin-title', 'Danh sách danh mục sản phẩm')
@section('content')
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
                            <a href="{{ route('product_cate.edit', $value->id) }}" class="btn btn-success btn-sm">Sửa</a>
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Xác nhận xóa')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $product_cate->links() }}
@endsection
