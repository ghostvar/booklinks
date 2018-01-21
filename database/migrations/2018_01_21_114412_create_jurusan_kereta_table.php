<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurusanKeretaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusan_kereta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stasiun_berangkat');
            $table->string('stasiun_sampai');
            $table->string('kereta_no');
            $table->string('waktu_berangkat');
            $table->string('waktu_sampai');
            $table->integer('kereta_id');
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
        Schema::dropIfExists('jurusan_kereta');
    }
}
