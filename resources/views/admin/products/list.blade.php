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
                <th>Status</th>
                <th>Brand</th>
                <th>Action</th>
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
                    <td>{{$p->status}}</td>
                    <td>{{$p->brand->name}}</td>
                    <td>
                        <a href="{{ route('products.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $p->id) }}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <button class="btn btn-danger" onClick="return confirm('Bạn có chắc không?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection