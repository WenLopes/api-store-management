<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('order_id');

            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id')->references('store_id')->on('store');

            $table->unsignedBigInteger('order_status_id');
            $table->foreign('order_status_id')->references('order_status_id')->on('order_status');

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customer');

            $table->string('code', 50)->unique();
            $table->decimal('items_price', 18, 2)->default(0);
            $table->decimal('freight', 18, 2)->default(0);
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
        Schema::dropIfExists('order');
    }
}
