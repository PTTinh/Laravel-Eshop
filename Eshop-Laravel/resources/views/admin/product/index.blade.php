@extends('layouts._admin')
@section('title', 'Danh sách sản phẩm')
@section('admin-title', 'Danh sách sản phẩm')
@section('content')
    <a href="#" class="btn btn-primary" data-bs-target="#ModalProductAdd" data-bs-toggle="modal">Thêm Sản Phẩm</a>
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
                            <a href="#" class="btn btn-success btn-sm js-product-edit" data-id="{{ $value->id }}"
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
    <x-app-modal id="ModalProductAdd" title="Thêm Sản Phẩm">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="product_cate_id" class="form-label">Chọn Danh Mục Sản Phẩm <span
                        class="text-danger">*</span></label>
                <select name="product_cate_id" id="product_cate_id" class="form-select" required>
                    @include('admin.product._product_cate')
                </select>
            </div>
            <x-app-input id="name" label="Nhập tên sản phẩm" required>
                <x-slot:element>
                    <span class="text-danger">*</span>
                </x-slot>
            </x-app-input>
            <x-app-input id="price" type="number" label="Giá sản phẩm" required>
                <x-slot:element>
                    <span class="text-danger">*</span>
                </x-slot>
            </x-app-input>
            <x-app-input id="discount_price" type="number" label="Giá khuyến mãi" required>
                <x-slot:element>
                    <span class="text-danger">*</span>
                </x-slot>
            </x-app-input>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả sản phẩm <span class="text-danger">*</span></label>
                <textarea name="description" id="description" class="form-control" rows="5"></textarea>
            </div>
            <x-app-input id="img" type="file" label="Ảnh Sản Phẩm" required>
                <x-slot:element>
                    <span class="text-danger">*</span>
                </x-slot>
            </x-app-input>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </x-app-modal>

    <x-app-modal id="ModalProductEdit" title="Sửa Sản Phẩm">
        <form id="fUpdateProduct" action="#" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="product_cate_id_update" class="form-label">Chọn Danh Mục Sản Phẩm <span
                        class="text-danger">*</span></label>
                <select name="product_cate_id" id="product_cate_id_update" class="form-select" required>
                    {{-- lấy từ js --}}
                </select>
            </div>
            <x-app-input id="name_update" name="name" label="Nhập tên sản phẩm" required>
                <x-slot:element>
                    <span class="text-danger">*</span>
                </x-slot>
            </x-app-input>
            <x-app-input id="price_update" type="number" name="price" label="Giá sản phẩm" required>
                <x-slot:element>
                    <span class="text-danger">*</span>
                </x-slot>
            </x-app-input>
            <x-app-input id="discount_price_update" type="number" name="discount_price" label="Giá khuyến mãi" required>
                <x-slot:element>
                    <span class="text-danger">*</span>
                </x-slot>
            </x-app-input>
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
    </x-app-modal>

    {{ $product->links() }}
@endsection
@section('script')
    <script src="{{ asset('js/product.js') }}"></script>
@endsection
