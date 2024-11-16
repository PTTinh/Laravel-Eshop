@php
    $products = App\Models\Product::all();
@endphp
<x-admin-layout title="welcome">
    <div style="display: flex">
        @foreach ($products as $product)
            <div class="card p-1 m-2" style="width: 18rem;">
                <img src="{{ asset('images/' . $product->img) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">Giá: <s>{{ number_format($product->price) }}</s></p>
                    <p class="card-text">Giá khuyến mãi: {{ number_format($product->discount_price) }}</p>
                    <a href="#" class="btn btn-primary">Thêm vào giỏ hàng</a>
                </div>
            </div>
        @endforeach
    </div>
</x-admin-layout>
