@extends('layouts.client')
@section('content')

    <h1> {{ $product->name }} </h1>
    <img src="{{$product->image}}" alt="">
    <p>Giá: {{$product->price}}</p>
    <p>Hãng: {{$product->brand->name}}</p>
@endsection