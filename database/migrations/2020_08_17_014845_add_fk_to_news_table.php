<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'news', 
            function (Blueprint $table) {
                $table->foreign('category_id')->references('id')->on('categories');
                $table->foreign('writer')->references('id')->on('users');
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
            'news', 
            function (Blueprint $table) {
                $table->dropForeign(['category_id']);
                $table->dropForeign(['writer']);
            }
        );
    }
}
