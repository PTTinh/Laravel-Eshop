<x-layout title="Giỏ hàng">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Giỏ hàng</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <colgroup>
                                <col style="width: 5%;">
                                <col style="width: 30%;">
                                <col style="width: 20%;">
                                <col style="width: 20%;">
                                <col style="width: 25%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Áo thun nam</td>
                                    <td>
                                        <input type="number" class="form-control" value="1">
                                    </td>
                                    <td>100.000</td>
                                    <td>100.000</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="#" class="btn btn-primary">Tiếp tục mua hàng</a>

                            </div>
                            <div>
                                <p>Tổng tiền: 100.000</p>
                                <a href="#" class="btn btn-success">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
