<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('orders')->nullable();
            $table->integer('order_done')->default(0);
            $table->string('amount')->nullable();
            $table->string('type')->nullable();
            $table->integer('status')->nullable();
            $table->unsignedInteger('market_id')->nullable();
            $table->unsignedInteger('warehouse_id')->nullable();
            $table->unsignedInteger('driver_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('market_id')
                ->references('id')->on('markets')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('driver_id')
                ->references('id')->on('drivers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('warehouse_id')
                ->references('id')->on('warehouses')
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
        Schema::dropIfExists('bills');
    }
}
