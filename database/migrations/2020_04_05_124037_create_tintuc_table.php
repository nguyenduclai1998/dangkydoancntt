<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTintucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintuc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tenbaiviet');
            $table->text('noidung');
            $table->bigInteger('chuyennganh_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('tintuc', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('chuyennganh_id')->references('id')->on('chuyennganh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tintuc');
        Schema::dropIfExists('tintuc');
    }
}
