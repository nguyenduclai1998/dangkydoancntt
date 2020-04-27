<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDexuatdetaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dexuatdetai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tendetai');
            $table->text('mota')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('chuyennganh_id')->unsigned();
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
        Schema::dropIfExists('dexuatdetai');
    }
}
