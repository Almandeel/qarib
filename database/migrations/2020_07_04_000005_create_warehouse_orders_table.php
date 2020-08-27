<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehouseOrdersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'warehouse_orders';

    /**
     * Run the migrations.
     * @table warehouse_orders
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
             
            $table->increments('id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('user_id');
            $table->tinyInteger('status')->nullable()->default('0');
            $table->unsignedInteger('warehouse_id');
            $table->timestamp('schedule_at')->nullable()->default(null);

            $table->index(["warehouse_id"], 'fk_warehouse_orders_warehouses1_idx');

            $table->index(["user_id"], 'fk_warehouse_orders_users1_idx');

            $table->index(["order_id"], 'fk_warehouse_orders_orders_idx');
            $table->timestamps();


            $table->foreign('order_id', 'fk_warehouse_orders_orders_idx')
                ->references('id')->on('orders')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('warehouse_id', 'fk_warehouse_orders_warehouses1_idx')
                ->references('id')->on('warehouses')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_id', 'fk_warehouse_orders_users1_idx')
                ->references('id')->on('users')
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
