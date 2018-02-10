<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuteKeretaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rute_kereta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jurusan_id');
            $table->string('stasiun_berangkat');
            $table->string('stasiun_sampai');
            $table->time('waktu_berangkat');
            $table->time('waktu_sampai');
            $table->integer('urutan');
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
        Schema::dropIfExists('rute_kereta');
    }
}
