<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverOrdersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'driver_orders';

    /**
     * Run the migrations.
     * @table driver_orders
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('warehouseorder_id')->nullable();
            $table->unsignedInteger('driver_id');
            $table->unsignedInteger('user_id');
            $table->tinyInteger('status')->nullable()->default('0');
            $table->double('cod')->nullable()->default(0);
            $table->double('bank')->nullable()->default(0);

            $table->index(["warehouseorder_id"], 'fk_driver_orders_warehouseorder_idx');

            $table->index(["user_id"], 'fk_driver_orders_users1_idx');

            $table->index(["driver_id"], 'fk_driver_orders_drivers1_idx');
            $table->timestamps();


            $table->foreign('warehouseorder_id', 'fk_driver_orders_warehouseorder_idx')
                ->references('id')->on('warehouse_orders')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('driver_id', 'fk_driver_orders_drivers1_idx')
                ->references('id')->on('drivers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_id', 'fk_driver_orders_users1_idx')
                ->references('id')->on('users')
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
       Schema::dropIfExists($this->tableName);
     }
}
