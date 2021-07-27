<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisTransportasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_transportasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipe_perjalanan_id');
            $table->string('nama');
            $table->timestamps();
            $table->foreign('tipe_perjalanan_id')->references('id')->on('tipe_perjalanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_transportasi');
    }
}
