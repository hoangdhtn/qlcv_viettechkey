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
        Schema::table('phongban_user', function (Blueprint $table) {
            $table->foreign(['phongban_id'])->references(['id'])->on('phongbans')->onDelete('CASCADE');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phongban_user', function (Blueprint $table) {
            $table->dropForeign('phongban_user_phongban_id_foreign');
            $table->dropForeign('phongban_user_user_id_foreign');
        });
    }
};
