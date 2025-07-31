<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //->all(): lất toàn bộ bản ghi
        //->get(): lấy dữ liệu dựa theo điều kiện và trả về hết 1 lượt
        //->paginate(x): trả dữ liệu theo từng page, mỗi page có x bản ghi
        //->first(): trả về bản ghi đầu tiên

        //sắp xếp (có 2 cách viết): orderBy('tenTruong','asc'); orderByDesc('tenTruong')
        //limit(x): giới hạn x bản ghi trả về
        
        $products = Product::orderByDesc('id')->get(); 
        /**
         * load(): dùng để load dữ liệu của những bảng khóa ngoại
         * - lấy 1 relation: load('tenRelation')
         * - lấy nhiều relation: load(['tenRelation1', 'tenRelation2'])
         */
        $products->load('brand');

        //first(): lấy bản ghi đầu tiên
        //all()->last(): lấy bản ghi cuối cùng
        // $product = Product::all()->last();

        return view('admin.products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();

        return view('admin.products.create', compact('brands'));
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

        Product::create($data); //lưu dữ liệu mới vào db

        return redirect()->route('products.index'); //điều hướng ng dùng về trang danh sách
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // $product = Product::where('id', $id)->first();
        $product = Product::find($id); //find(): tìm bản ghi có id trùng với $id
        $product->load('brand'); //load('tenRelation'): load dữ liệu từ relation
        
        //để lấy dữ liệu từ relation: $tenBien->tenRelation->tenTruong
        dd($product->brand->name);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) //Model Binding
    {
        $brands = Brand::all();

        return view('admin.products.edit', compact('product', 'brands'));
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

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete(); //xóa bản ghi

        return redirect()->route('products.index');
    }
}
