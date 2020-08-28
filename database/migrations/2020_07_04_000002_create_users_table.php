<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('username', 16);
            $table->string('email', 25)->nullable();
            $table->string('password', 64);
            $table->unsignedInteger('driver_id')->nullable();
            $table->unsignedInteger('market_id')->nullable();
            $table->tinyInteger('status')->nullable()->default('1');

            $table->unique(["username"], 'username_UNIQUE');


            $table->timestamps();

            $table->foreign('driver_id')
            ->references('id')->on('drivers')
            ->onDelete('no action')
            ->onUpdate('cascade');

            $table->foreign('market_id')
            ->references('id')->on('markets')
            ->onDelete('no action')
            ->onUpdate('cascade');
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
