<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'drivers';

    /**
     * Run the migrations.
     * @table drivers
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 45)->nullable();
            $table->string('phone', 45);
            $table->string('address', 45)->nullable();
            $table->string('email', 45)->nullable();
            $table->string('car', 45)->nullable();
            $table->double('salary')->nullable();
            $table->double('commission')->nullable();
            $table->integer('max_orders')->nullable();
            $table->tinyInteger('status')->default(0);
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
       Schema::dropIfExists($this->tableName);
     }
}
