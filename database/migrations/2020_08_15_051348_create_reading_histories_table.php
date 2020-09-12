<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'reading_histories', 
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('users_id');
                $table->unsignedBigInteger('news_id');
                $table->boolean('liked')->default(false);
                $table->dateTime('readed_at')->index();
                $table->softDeletes();

                $table->unique(['users_id','news_id']);
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
        Schema::dropIfExists('reading_histories');
    }
}
