<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item', function (Blueprint $table) {
            $table->bigIncrements('order_item_id');

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('order_id')->on('order');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('product');

            $table->integer('quantity')->default(1);
            $table->decimal('total_price', 18, 2)->default(0);

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
        Schema::dropIfExists('order_item');
    }
}
