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
            $table->string('no_un', 50)->nullable();
            $table->string('jenis_kelamin', 10)->nullable();
            $table->string('kota', 50)->nullable();
            $table->string('agama', 10)->nullable();
            $table->string('asal_sekolah', 100)->nullable();
            $table->string('ttl', 25)->nullable();
            $table->string('nama_orangtua', 50)->nullable();
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
