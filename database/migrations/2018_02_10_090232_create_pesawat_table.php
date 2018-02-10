<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesawatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesawat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('kode');
            $table->string('type_pesawat');
            $table->integer('exec_seat_num')->nullable();
            $table->integer('busines_seat_num')->nullable();
            $table->integer('eco_seat_num')->nullable();
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
        Schema::dropIfExists('pesawat');
    }
}
