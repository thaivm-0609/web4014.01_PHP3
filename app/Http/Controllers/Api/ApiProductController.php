<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('status', 1)->get();
        
        // return response()->json($products);
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //lấy dữ liệu được gửi qua $request
        $data = [
            'name' => $request->input('name'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'image' => $request->input('image'),
            'status' => $request->input('status'),
            'brand_id' => $request->input('brand_id'),
        ];
        $newProduct = Product::create($data); //lưu dữ liệu mới vào db

        return response()->json($newProduct);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('brand');
        
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //update dữ liệu vào db
        $product->fill([
          'name' => $request->input('name'), 
          'price' => $request->input('price'),  
          'quantity' => $request->input('quantity'),  
          'status' => $request->input('status'),  
          'brand_id' => $request->input('brand_id'),  
          'image' => $request->input('image')
        ])->save();

        return response()->json("Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json("Xóa thành công");
    }
}
