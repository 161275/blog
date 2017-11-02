<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->strings('title',256);
            $table->strings('subtitle',256);
            $table->strings('slug',100);
            $table->text('body',100);
            $table->boolean('status');
            $table->strings('image');
            $table->integer('posted_by');
            $table->timestamps();
            $table->integer('like');
            $table->integer('dislike');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
