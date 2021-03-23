<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('mrp');
            $table->string('discount')->nullable()->comment("in percentage");
            $table->string('description')->nullable();
            $table->string('stock')->nullable();
            $table->string('image')->default('product.jpg');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
