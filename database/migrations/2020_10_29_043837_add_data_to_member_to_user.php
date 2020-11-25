<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataToMemberToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('no_telp')->after('email');
            $table->string('no_wa')->nullable();
            $table->string('negara');
            $table->string('jenis_identitas');
            $table->string('no_identitas');
            $table->string('instansi_organisasi');
            $table->string('nip')->nullable();
            $table->string('unit_kerja')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
