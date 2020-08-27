<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bill_id');
            $table->unsignedInteger('order_id');
            $table->tinyInteger('status')->nullable()->default('0');
            $table->timestamps();

            $table->foreign('bill_id')
                ->references('id')->on('bills')
                ->onDelete('no action')
                ->onUpdate('no action');
            
            $table->foreign('order_id')
            ->references('id')->on('orders')
            ->onDelete('no action')
            ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_orders');
    }
}
