@extends('layouts._admin')
@section('title', 'Danh sách sản phẩm')
@section('admin-title', 'Danh sách sản phẩm')
@section('content')
    <table class="table table-striped">
        <colgroup>
            <col style="width: 5%;" />
            <col style="width: 30%;" />
            <col style="width: 20%;" />
            <col style="width: 15%;" />
            <col style="width: 20%;" />
            <col style="width: 10%;" />
        </colgroup>
        <thead class="table-dark">
            <tr>
                <th>TT</th>
                <th>Danh mục</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Ảnh</th>
                <th>Tùy Biến</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 0; @endphp
            @foreach ($product as $value)
            @php $i++; @endphp
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $value->product_cate->name }}</td>
                    <td>{{ $value->name }}</td>
                    <td>
                        @if (empty($value->discount_price) || $value->discount_price == 0)
                            {{ number_format($value->price) }}
                        @else
                            <s>{{ number_format($value->price) }}</s><br>
                            {{ number_format($value->discount_price) }}
                        @endif
                    </td>
                    <td><img src="{{ asset("images/". $value->img) }}" alt="" width="100"></td>
                    <td>
                        <form action="{{ route('product.destroy', $value->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('product.edit',  $value->id) }}" class="btn btn-success btn-sm">Sửa</a>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xóa')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $product->links() }}
@endsection
