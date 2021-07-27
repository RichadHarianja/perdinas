<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengaju_id');
            $table->foreignId('PUK_id');
            $table->string('judul_perjalanan');
            $table->foreignId('jenis_transportasi_id');
            $table->foreignId('tujuan_perjalanan_id');
            $table->dateTime('datetime_keberangkatan');
            $table->dateTime('datetime_kembali');
            $table->string('alamat_tujuan');
            $table->string('alamat_asal');
            $table->string('keterangan');
            $table->bigInteger('jumlah_pengajuan');
            $table->string('attachment');
            $table->foreignId('status_id');
            $table->string('attachment_pencairan')->nullable();
            $table->boolean('edited')->default(false);
            $table->foreignid('parent_id')->nullable();
            $table->timestamps();

            $table->foreign('pengaju_id')->references('id')->on('users');
            $table->foreign('PUK_id')->references('id')->on('users');
            $table->foreign('jenis_transportasi_id')->references('id')->on('jenis_transportasi');
            $table->foreign('tujuan_perjalanan_id')->references('id')->on('tujuan_perjalanan');
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('parent_id')->references('id')->on('pengajuan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan');
    }
}
