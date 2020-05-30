<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersPreferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_preference', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->boolean('notifications');
            $table->boolean('notifications_web');
            $table->boolean('notifications_movil');
            $table->boolean('notifications_email');
            $table->boolean('2fa');

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
        Schema::dropIfExists('users_preference');
    }
}
