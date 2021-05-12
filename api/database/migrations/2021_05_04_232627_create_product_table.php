<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id')->references('store_id')->on('store');
            $table->string('bar_code', 200)->unique();
            $table->string('short_description', 50);
            $table->text('description')->nullable();
            $table->integer('stock_quantity')->default(0);
            $table->string('dimensions', 50)->nullable();
            $table->string('hexadecimal_color', 7)->nullable();
            $table->enum('size', ['PP', 'P', 'M', 'G', 'GG', 'EG', 'EGG'])->nullable();
            $table->decimal('unity_price', 18, 2)->default(0);
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('product');
    }
}
