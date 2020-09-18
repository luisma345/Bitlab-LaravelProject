<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'comments',
            function (Blueprint $table) {
                $table->foreign('news_id')->references('id')->on('news');
                $table->foreign('made_by')->references('id')->on('users');
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
            'comments', 
            function (Blueprint $table) {
                $table->dropForeign(['news_id']);
                $table->dropForeign(['made_by']);
            }
        );
    }
}
