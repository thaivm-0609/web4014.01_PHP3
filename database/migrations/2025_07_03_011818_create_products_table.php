<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // $table->kieuDuLieu('tenCot');
            $table->string('name'); //cột name, kiểu dữ liệu là string
            $table->integer('quantity'); //cột quantity, kiểu dữ liệu là integer
            $table->integer('price'); //cột price, kiểu dữ liệu là integer
            $table->string('image')->nullable(); //cột image, kiểu dữ liệu là string
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
