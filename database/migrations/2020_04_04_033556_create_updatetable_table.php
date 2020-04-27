<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdatetableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('role');
        });

        Schema::table('thongtin', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('detai', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('chuyennganh_id')->references('id')->on('chuyennganh');
        });

        Schema::table('dexuatdetai', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('chuyennganh_id')->references('id')->on('chuyennganh');
        });

        Schema::table('ketquadangky', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('detai_id')->references('id')->on('detai');
            $table->foreign('detaidexuat_id')->references('id')->on('dexuatdetai');
        });

        Schema::table('cauhoi', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('detai_id')->references('id')->on('detai');
            $table->foreign('detaidexuat_id')->references('id')->on('dexuatdetai');
        });

        Schema::table('traloicauhoi', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cauhoi_id')->references('id')->on('cauhoi');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('thongtin');
        Schema::dropIfExists('detai');
        Schema::dropIfExists('dexuatdetai');
        Schema::dropIfExists('ketquadangky');
        Schema::dropIfExists('cauhoi');
        Schema::dropIfExists('traloicauhoi');
    }
}
