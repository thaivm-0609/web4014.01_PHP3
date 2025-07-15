<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name',
    ];

    //khai báo relation: 1 brand có nhiều product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
