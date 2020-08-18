<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'news', 
            function (Blueprint $table) {
                $table->id();
                $table->string('title')->index();
                $table->text('description');
                $table->text('article');
                $table->dateTime('publication_date')->nullable()->index();
                $table->unsignedBigInteger('category_id');
                $table->unsignedBigInteger('total_comments')->default(0);
                $table->unsignedBigInteger('admin_user_id')->index();
                $table->timestamps();
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
        Schema::dropIfExists('news');
    }
}
