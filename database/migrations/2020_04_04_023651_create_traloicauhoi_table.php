<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraloicauhoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traloicauhoi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('noidung');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('cauhoi_id')->unsigned();
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
        Schema::dropIfExists('traloicauhoi');
    }
}
