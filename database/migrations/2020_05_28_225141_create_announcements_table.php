<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_currency_from');
            $table->unsignedBigInteger('id_currency_to');
            $table->unsignedBigInteger('id_category');
            $table->string('title',80);
            $table->text('description');
            $table->float('price',10,2);
            $table->float('min',10,2);
            $table->float('max', 10,2);
            $table->boolean('percetange')->default(1);
            $table->boolean('stateIssuer')->default(0);
            $table->boolean('stateRecipient')->default(0);

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_currency_from')->references('id')->on('currencies')->onDelete('cascade');
            $table->foreign('id_currency_to')->references('id')->on('currencies')->onDelete('cascade');
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('announcements');
    }
}
