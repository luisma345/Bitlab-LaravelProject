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
                $table->foreign('admin_user_id')->references('id')->on('admin_users');
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
                $table->dropForeign(['admin_user_id']);
                $table->dropForeign(['writer_id']);
            }
        );
    }
}
