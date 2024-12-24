<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterOnlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_online', function (Blueprint $table) {
            $table->id();
            $table->string('code_pendaftaran', 50);
            $table->string('fullname', 50);
            $table->string('email', 50);
            $table->string('no_hp', 50);
            $table->string('alamat', 100);
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
        Schema::dropIfExists('register_online');
    }
}
