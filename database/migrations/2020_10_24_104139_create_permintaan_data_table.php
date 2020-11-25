<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaanDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_data', function (Blueprint $table) {
            $table->string('id');
            $table->string('title');
            $table->unsignedBigInteger('id_sektoral');
            $table->text('tujuan');
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->date('tanggal_pengajuan');
            $table->string('status');
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
        Schema::dropIfExists('permintaan_data');
    }
}
