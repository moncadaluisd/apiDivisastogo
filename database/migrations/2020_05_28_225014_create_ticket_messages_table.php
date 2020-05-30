<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ticket');
            $table->unsignedBigInteger('id_user');
            $table->integer('type'); //1:admin 2:usuario
            $table->text('message');
            $table->string('upload', 120)->nullable();

            $table->foreign('id_ticket')->references('id')->on('tickets')->onDelete('cascade');
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
        Schema::dropIfExists('_tickets_messages');
    }
}
