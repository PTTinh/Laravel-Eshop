<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name')->nullable();
            $table->decimal('price', 22, 2);
            $table->decimal('discount_price', 22, 2)->nullable();
            $table->text('description')->nullable();
            $table->string('img')->nullable();
            $table->integer('product_cate_id')->nullable();
            $table->timestamps();
            //Tăng tốc độ tìm kiếm
            $table->index('product_cate_id');
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
};
