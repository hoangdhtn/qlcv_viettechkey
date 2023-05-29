<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phanhoibaocao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_baocao');
            $table->bigInteger('id_nguoigui');
            $table->string('tieude');
            $table->text('noidung');
            $table->string('trangthai');
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
        Schema::dropIfExists('phanhoibaocao');
    }
};
