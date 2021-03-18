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
            $table->timestamps();
            $table->string('title');
            $table->foreignId('supplier_id')->constrained('users')->onDelete('cascade');
            $table->integer("mrp");
            $table->string('discount')->nullable();
            $table->string('description')->nullable();
            $table->string('stock')->nullable();
            $table->string('best_seller')->default('0');
            $table->string('image')->default('product.jpg');
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
