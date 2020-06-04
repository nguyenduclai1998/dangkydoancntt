<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongtinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongtin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('ngaysinh')->nullable();
            $table->bigInteger('sdt')->nullable();
            $table->string('masv')->nullable();
            $table->char('gioitinh',20)->nullable();
            $table->string('avatar')->nullable();
            $table->bigInteger('user_id')->nullable()->unsigned();
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
        Schema::dropIfExists('thongtin');
    }
}
