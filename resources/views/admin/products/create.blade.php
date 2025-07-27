@extends('layouts.admin')
@section('content')
    <h1>Đây là trang thêm mới</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="" class="form-label">Name</label>
            <input class="form-control" type="text" name="name">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Quantity</label>
            <input class="form-control" type="number" name="quantity">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Price</label>
            <input class="form-control" type="number" name="price">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Image</label>
            <input class="form-control" type="type" name="image">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Status</label>
            <select class="form-control" name="status">
                <option value="0">Ngừng kinh doanh</option>
                <option value="1">Đang kinh doanh</option>
            </select>
        </div>
        <div class="form-group">
            <label for="" class="form-label">Brand</label>
            <select class="form-control" name="brand_id">
                @foreach ($brands as $b)
                    <option value="{{$b->id}}">{{$b->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-2">Tạo mới</button>
    </form>
@endsection