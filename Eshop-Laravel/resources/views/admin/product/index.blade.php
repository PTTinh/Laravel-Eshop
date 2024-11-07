@extends('layouts._admin')
@section('title', 'Danh sách sản phẩm')
@section('admin-title', 'Danh sách sản phẩm')
@section('content')
    <a href="#" class="btn btn-primary" 
                data-bs-target="#ModalProductAdd" 
                data-bs-toggle="modal">Thêm Sản Phẩm</a>
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
                    <td><img src="{{ asset('images/' . $value->img) }}" alt="" width="100"></td>
                    <td>
                        <form action="{{ route('product.destroy', $value->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="#" class="btn btn-success btn-sm js-product-edit"
                                data-id="{{ $value->id }}"
                                data-urlCate="{{ route('product.create') }}"
                                data-urlImg="{{ asset('images/' . $value->img) }}"
                                data-urlGet="{{ route('product.edit', $value->id) }}"
                                data-urlPut="{{ route('product.update', $value->id) }}">Sửa</a>
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Xác nhận xóa')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="ModalProductAdd" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Thêm Sản Phẩm</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="product_cate_id" class="form-label">Chọn Danh Mục Sản Phẩm <span
                                    class="text-danger">*</span></label>
                            <select name="product_cate_id" id="product_cate_id" class="form-select" required>
                                 @include('admin.product._product_cate')
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nhập tên sản phẩm <span
                                    class="text-danger">*</span></label>
                            <input name="name" id="name" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá sản phẩm <span class="text-danger">*</span></label>
                            <input name="price" id="price" type="number" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="discount_price" class="form-label">Giá khuyến mãi <span
                                    class="text-danger">*</span></label>
                            <input name="discount_price" id="discount_price" type="number" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả sản phẩm <span
                                    class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Ảnh Sản Phẩm <span class="text-danger">*</span></label>
                            <input name="img" id="img" type="file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalProductEdit" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel1">Sửa Sản Phẩm</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="fUpdateProduct" action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="product_cate_id_update" class="form-label">Chọn Danh Mục Sản Phẩm <span class="text-danger">*</span></label>
                            <select name="product_cate_id" id="product_cate_id_update" class="form-select" required>
                                {{-- lấy từ js --}}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name_update" class="form-label">Nhập tên sản phẩm <span class="text-danger">*</span></label>
                            <input name="name" id="name_update" type="text" class="form-control"
                                value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="price_update" class="form-label">Giá sản phẩm <span class="text-danger">*</span></label>
                            <input name="price" id="price_update" type="number" class="form-control" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="discount_price_update" class="form-label">Giá khuyến mãi <span class="text-danger">*</span></label>
                            <input name="discount_price" id="discount_price_update" type="number" class="form-control"
                                value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="description_update" class="form-label">Mô tả sản phẩm <span class="text-danger">*</span></label>
                            <textarea name="description" id="description_update" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="img_update" class="form-label">Ảnh Sản Phẩm <span class="text-danger">*</span></label>
                            <img src="" id="img_show_update" alt="" width="100">
                            <input name="img" id="img_update" type="file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{ $product->links() }}
@endsection
@section('script')
    <script src="{{ asset('js/product.js') }}"></script>
@endsection
