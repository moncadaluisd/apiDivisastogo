<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements_message', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_request');
            $table->unsignedBigInteger('id_user');
            $table->text('message');
            $table->string('upload', 120)->nullable();

            $table->foreign('id_request')->references('id')->on('announcements_request')->onDelete('cascade');
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
        Schema::dropIfExists('announcements_message');
    }
}
