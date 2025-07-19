<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

/**tenMethod: phương thức truyền tải dữ liệu: 
    * get: lấy dữ liệu về và hiển thị ra
    * post: gửi dữ liệu lên server -> thêm mới bản ghi
    * put: gửi dữ liệu lên server -> chỉnh sửa bản ghi
    * delete: xóa bản ghi
*/
//Truong hop 1: tra thang ve giao dien, khong qua xu ly logic
//Route::tenMethod('/url', function() { return view('tenView'); }); 
Route::get('/', function () {
    return view('welcome');
});

//Truong hop 2: goi sang controller
//Route::tenMethod('/url', [TenController::class, 'tenFunction']);
Route::get('/home', [HomeController::class, 'home']);

//prefix: tiền tố
Route::prefix('/admin')->group(function () {
    Route::get('/', []); //url: /admin
    Route::resource('/products', ProductController::class);
    // Route::prefix('/products')->group(function () {
    //     Route::get('/', [ProductController::class, 'list']); //url: /admin/products
    //     Route::get('/create', [ProductController::class, 'create']); //url: /admin/products/create
    //     //thêm tham số vào trong url: /{tenThamSo};
    //     Route::get('/update/{productId}', [ProductController::class, 'update']); //url: /admin/products/update/{id}
    // });
    Route::prefix('/users')->group(function () {
        Route::get('/', []); //url: /admin/users
        Route::get('/create', []); //url: /admin/users/create
        Route::get('/update', []); //url: /admin/users/update
    });
});