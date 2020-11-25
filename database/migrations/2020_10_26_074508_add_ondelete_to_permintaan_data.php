<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOndeleteToPermintaanData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permintaan_data', function (Blueprint $table) {
            $table->foreign('id_user')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('id_sektoral')
                ->references('id')->on('sektorals')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permintaan_data', function (Blueprint $table) {
            //
        });
    }
}
