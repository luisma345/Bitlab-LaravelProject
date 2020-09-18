<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToReadingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'reading_histories', 
            function (Blueprint $table) {
                $table->foreign('users_id')->references('id')->on('users');
                $table->foreign('news_id')->references('id')->on('news');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'reading_histories', 
            function (Blueprint $table) {
                $table->dropForeign(['users_id']);
                $table->dropForeign(['news_id']);
            }
        );
    }
}
