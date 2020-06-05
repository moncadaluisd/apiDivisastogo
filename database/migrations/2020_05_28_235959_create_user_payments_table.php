<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->unique();
            $table->float('ammount',10,2);
            $table->string('upload', 255)->nullable();
            $table->integer('type'); //1: paypal, 2:skrill, 3:zelle, 4:bofa, 5:bs
            $table->integer('state')->default(1); //1: abierto,  2: verificado, 3: un problema;

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('users_payments');
    }
}
