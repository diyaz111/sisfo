<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeTableInRegisterOnline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register_online', function (Blueprint $table) {
            $table->string('no_un')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('kota')->nullable();
            $table->string('agama')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('ttl')->nullable();
            $table->string('nama_orangtua')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('register_online', function (Blueprint $table) {
            Schema::dropIfExists('no_un');
            Schema::dropIfExists('jenis_kelamin');
            Schema::dropIfExists('kota');
            Schema::dropIfExists('agama');
            Schema::dropIfExists('asal_sekolah');
            Schema::dropIfExists('ttl');
            Schema::dropIfExists('nama_orangtua');
        });
    }
}
