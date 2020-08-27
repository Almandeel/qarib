<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'orders';

    /**
     * Run the migrations.
     * @table orders
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_number')->unique()->nullable();
            $table->string('customer', 45)->nullable();
            $table->string('phone', 45)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('receiver', 45)->nullable();
            $table->string('receiver_phone', 45)->nullable();
            $table->string('receiver_address', 255)->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->nullable()->default('0');
            $table->double('amount')->nullable();
            $table->double('delivery_amount')->nullable();
            $table->double('driver_amount')->nullable()->default('0');;
            $table->double('net')->nullable()->default('0');
            $table->tinyInteger('pyment_type')->nullable()->default('0');
            $table->tinyInteger('pyment_status')->nullable()->default('0');
            $table->unsignedInteger('market_id')->nullable();

            $table->index(["market_id"], 'fk_orders_markets1_idx');
            $table->timestamps();


            $table->foreign('market_id', 'fk_orders_markets1_idx')
                ->references('id')->on('markets')
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
