<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    /*
    `id` bigint(20) UNSIGNED NOT NULL,
`name` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
`duration` int(1) DEFAULT NULL COMMENT '1:Year - 2:Month',
`price` float(10,2) DEFAULT NULL,
`description` text COLLATE utf8_spanish_ci
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('duration'); //1:Year - 2:Month
            $table->float('price', 10,2);
            $table->unsignedBigInteger('id_user_level');
            $table->mediumText('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
