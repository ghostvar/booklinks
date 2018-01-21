<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJalurKeretaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jalur_kereta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kereta_no');
            $table->string('jalur_awal');
            $table->string('jalur_akhir');
            $table->string('urutan_jalur');
            $table->time('waktu_berangkat');
            $table->time('waktu_sampai');
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
        Schema::dropIfExists('jalur_kereta');
    }
}
