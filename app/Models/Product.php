<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //khai báo các trường có thể thay đổi/cập nhật
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'image',
        'status',
        'brand_id',
    ];

    //khai báo quan hệ với các model khác
    //1 product thì thuộc 1 brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
