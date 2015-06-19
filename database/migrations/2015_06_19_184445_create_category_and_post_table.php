<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryAndPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories',function(Blueprint $table){
            $table->increments('id');
            $table->char('name');
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->longText('content');
            $table->integer('category_id')->unsigned()->default(0);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->boolean('active')->default(0);
            $table->timestamps();
        });

        // and tags and comments
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->char('tag');

            $table->integer('post_id')->unsigned()->default(0);
            $table->foreign('post_id')->references('id')->on('posts');

            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment');
            $table->char('author');

            $table->integer('post_id')->unsigned()->default(0);
            $table->foreign('post_id')->references('id')->on('posts');

            $table->integer('parent_comment_id')->unsigned()->default(0);
            $table->foreign('parent_comment_id')->references('id')->on('comments');

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
        Schema::drop('comments');
        Schema::drop('tags');
        Schema::drop('posts');
        Schema::drop('categories');
    }
}
