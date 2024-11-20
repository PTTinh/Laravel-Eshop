
<x-layout title="Giỏ hàng">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Giỏ hàng</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <colgroup>
                                <col style="width: 5%;">
                                <col style="width: 20%;">
                                <col style="width: 25%;">
                                <col style="width: 10%;">
                                <col style="width: 20%;">
                                <col style="width: 20%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Hình</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($products as $product)
                                    @php
                                        $price = $product->price;
                                        $quantity = $carts[$product->id];
                                        $total += $price * $quantity;
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <img width='30px' src="{{ asset('images/'.$product->img) }}" alt="{{ $product->name }}" class="img-fluid">
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <input type="number" class="form-control" value="{{ $quantity }}">
                                        </td>
                                        <td>{{ number_format($product->price) }}</td>
                                        <td>{{ number_format($price * $quantity) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <div>
                                <p>Tổng tiền: {{ number_format($total) }}</p>
                                <a href="#" class="btn btn-success">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
