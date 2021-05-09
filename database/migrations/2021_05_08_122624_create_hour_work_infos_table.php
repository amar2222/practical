<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHourWorkInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hour_work_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('work_day');
            $table->integer('work_hour');
            $table->integer('total_sub');
            $table->integer('sub_p_day');
            $table->integer('total_h_w');
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
        Schema::dropIfExists('hour_work_infos');
    }
}
