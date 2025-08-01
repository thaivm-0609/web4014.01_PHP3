<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::where('status', 1)->get();
        //->load('tenRelation'): lấy dữ liệu brand của từng sản phẩm
        $products->load('brand');
        
        // return view('clients.products', ['products' => $products]); 
        return view('clients.products.list', compact('products'));
    }

    // public function detail($id)
    public function detail(Product $product) //su dung ModelBinding
    {
        $product->load('brand');

        return view('clients.products.detail', compact('product'));
    }
}
