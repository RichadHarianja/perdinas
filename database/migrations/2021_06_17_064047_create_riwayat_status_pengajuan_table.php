<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatStatusPengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_status_pengajuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('approver_id')->nullable();
            $table->foreignId('pengajuan_id');
            $table->foreignId('status_id');
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('approver_id')->references('id')->on('users');
            $table->foreign('pengajuan_id')->references('id')->on('pengajuan');
            $table->foreign('status_id')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_status_pengajuan');
    }
}
