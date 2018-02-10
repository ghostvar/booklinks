<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenerbanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerbangan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_penerbangan');
            $table->string('asal');
            $table->string('tujuan');
            $table->time('waktu_berangkat');
            $table->time('waktu_sampai');
            $table->integer('pesawat_id');
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
        Schema::dropIfExists('penerbangan');
    }
}
