<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        return 'Danh sach';
    }

    public function create()
    {
        return 'Thêm mới';
    }

    public function update($id)
    {
        dd($id);
        return 'Chỉnh sửa';
    }
}
