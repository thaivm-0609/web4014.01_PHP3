@extends('layouts.admin')
@section('content')
    <h1>Đây là màn danh sách</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Brand</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->name}}</td>
                    <td><img src="{{$p->image}}" alt=""></td>
                    <td>{{$p->price}}</td>
                    <td>{{$p->quantity}}</td>
                    <td>{{$p->brand->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection