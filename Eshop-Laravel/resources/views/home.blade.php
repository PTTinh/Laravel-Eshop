@php
    $product_cates = App\Models\ProductCate::all();
    $products = App\Models\Product::all();
@endphp
<x-layout title="Home">
    <div class="col-12">
        {{-- Banner --}}
        @include('include._banner')
    </div>
    <div class="col-12">
        <div class="col-12">
            {{-- Danh mục --}}
            <h2>Product Overview</h2>
            <ul class="nav nav-underline bg-light">
                <li class="nav-item">
                    <a class="nav-link active" href="#">All Products</a>
                </li>
                @foreach ($product_cates as $product_cate)
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ $product_cate->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-3 col-6">
                    <div class="card p-1 m-2 h-100">
                        <img src="{{ asset('images/' . $product->img) }}" class="card-img-top" alt="..."
                            style="height: 200px;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">Giá: <s>{{ number_format($product->price) }}</s><br>
                                Giá khuyến mãi: {{ number_format($product->discount_price) }}
                            </p>
                            <a href="#" class="btn btn-primary mt-auto">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>