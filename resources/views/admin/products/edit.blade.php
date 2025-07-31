@extends('layouts.admin')
@section('content')
    <h1>Đây là trang chỉnh sửa</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="" class="form-label">Name</label>
            <input class="form-control" type="text" name="name" value="{{$product->name}}">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Quantity</label>
            <input class="form-control" type="number" name="quantity" value="{{$product->quantity}}">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Price</label>
            <input class="form-control" type="number" name="price" value="{{$product->price}}">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Image</label>
            <input class="form-control" type="type" name="image" value="{{$product->image}}">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Status</label>
            <select class="form-control" name="status">
                <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Ngừng kinh doanh</option>
                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Đang kinh doanh</option>
            </select>
        </div>
        <div class="form-group">
            <label for="" class="form-label">Brand</label>
            <select class="form-control" name="brand_id">
                @foreach ($brands as $b)
                    <option value="{{$b->id}}" @selected(old('brand_id', $product->brand_id) == $b->id)>{{$b->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-2">Chỉnh sửa</button>
    </form>
@endsection