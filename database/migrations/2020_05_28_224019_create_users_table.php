<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
/*
     `id` bigint(20) UNSIGNED NOT NULL,
 `id_level` bigint(20) DEFAULT NULL,
 `username` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
 `email` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
 `password` varchar(255) DEFAULT NULL,
 `email_verify` tinyint(1) DEFAULT '0' COMMENT '1:Active - 2:Inactive',
 `email_token` varchar(40) DEFAULT NULL,
 `phone` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
 `phone_verify` tinyint(1) DEFAULT '0' COMMENT '	1:Active - 2:Inactive	',
 `phone_token` char(6) DEFAULT NULL,
 `token_verify` tinyint(1) DEFAULT '0' COMMENT '1:Active - 2:Inactive',
 `verified` tinyint(1) DEFAULT '0' COMMENT '1:Active - 2:Inactive',
 `remember_token` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
 `google_auth_code` varchar(16) COLLATE utf8_spanish_ci DEFAULT NULL,
 `state` tinyint(1) DEFAULT NULL COMMENT '	1:Active - 2:Inactive',
 `last_login` timestamp NULL DEFAULT NULL*/
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_level');
            $table->string('username', 20)->unique();
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->string('phone', 20)->nullable()->unique();

            $table->boolean('email_verify')->default(0);
            $table->boolean('phone_verify')->default(0);
            $table->boolean('token_verify')->default(0);
            $table->boolean('verified')->default(0);

            $table->string('phone_token', 6);
            $table->string('email_token', 40);
            $table->string('remember_token', 100)->nullable();
            $table->string('google_auth_code', 16)->nullable();
            $table->boolean('state')->nullable();

            $table->foreign('id_level')->references('id')->on('users_levels')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
