<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        
        $product = Product::where('status', 0)
            ->orderByDesc('id') 
            ->limit(2)
            ->get(); 
        /**
         * load(): dùng để load dữ liệu của những bảng khóa ngoại
         * - lấy 1 relation: load('tenRelation')
         * - lấy nhiều relation: load(['tenRelation1', 'tenRelation2'])
         */
        $product->load('brand');

        //first(): lấy bản ghi đầu tiên
        //all()->last(): lấy bản ghi cuối cùng
        // $product = Product::all()->last();

        dd($product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
