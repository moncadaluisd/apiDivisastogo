<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /*
    `id_user` bigint(20) DEFAULT NULL,
  `avatar` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `dni` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `country` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `state` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `zip` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `address` text COLLATE utf8_spanish_ci,
  `photo_dni` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `photo_selfie` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL
     */
    public function up()
    {
        Schema::create('users_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('avatar', 100)->nullable();
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('dni',40);
            $table->date('birth_date');
            $table->string('country', 80)->nullable();
            $table->string('zip', 8)->nullable();
            $table->string('photo_dni',100)->nullable();
            $table->string('photo_selfie', 100)->nullable();
            $table->string('state',80)->nullable();
            $table->mediumText('address')->nullable();

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
        Schema::dropIfExists('users_data');
    }
}
