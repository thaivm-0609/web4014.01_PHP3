@extends('layouts.client')

@section('content')
    <h1>Danh sách sản phẩm</h1>
    
    <div class="row">
    @foreach ($products as $p)
        <div class="card col m-3" style="width: 18rem;">
            <img src="{{$p->image}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $p->name }}</h5>
                <p class="card-text">Giá: {{ $p->price }} VNĐ</p>
                <p class="card-text">Hãng: {{ $p->brand->name }}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    @endforeach
    </div>
    
@endsection
