<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements_request', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_announcement');
            $table->unsignedBigInteger('id_user_issuer');
            $table->float('amount',20,2);
    //        $table->float('rate',10,2);
            $table->float('price',10,2);
            $table->float('min',10,2);
            $table->float('max', 10,2);
            $table->boolean('pay')->default(0); //'0:Unpaid 1:Pay',
            $table->boolean('stateIssuer')->default(0);
            $table->boolean('stateRecipient')->default(0);
            $table->integer('state')->default(1); //1:abierto, 2:cerrado, 3:cancelado

            $table->foreign('id_announcement')->references('id')->on('announcements')->onDelete('cascade');
            $table->foreign('id_user_issuer')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('announcements_request');
    }
}
