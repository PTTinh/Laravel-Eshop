@php
    $productCate = App\Models\ProductCate::all();
@endphp
<option value>-- Chọn --</option>
@foreach ($productCate as $value)
    <option value="{{ $value->id }}">{{ $value->name }}</option>
@endforeach