<x-admin-layout title="Danh sách danh mục sản phẩm">
    <a href="#" class="btn btn-primary" data-bs-target="#ModalProductCateAdd" data-bs-toggle="modal">Thêm Danh Mục</a>
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
                            <a href="#" data-id="{{ $value->id }}"
                                data-urlGet="{{ route('product_cate.edit', $value->id) }}"
                                data-urlPut="{{ route('product_cate.update', $value->id) }}"
                                class="btn btn-success btn-sm js-product-cate-edit">Sửa</a>
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Xác nhận xóa')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <x-app-modal title="Thêm Danh Mục" id="ModalProductCateAdd">
        <form action="{{ route('product_cate.store') }}" method="post">
            @csrf
            <x-app-input id="name" name="name" label="Tên danh mục" placeholder="Nhập tên danh mục" required />
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </x-app-modal>
    <x-app-modal title="Sửa Danh Mục" id="ModalProductCateEdit">
        <form id="fUpdate" action="#" method="POST">
            @csrf
            @method('PUT')
            <x-app-input id="name-update" name="name" label="Tên danh mục"  placeholder="Nhập tên danh mục" required />
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>
    </x-app-modal>
    {{ $product_cate->links() }}
    <x-slot:script>
        <script src="{{ asset('js/product-cate.js') }}"></script>
    </x-slot>
</x-admin-layout>
