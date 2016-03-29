<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleAuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_author', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned();
            $table->integer('author_id', 10)->change();
            $table->integer('article_id')->unsigned();
            $table->integer('article_id', 10)->change();

            $table->foreign('article_id')
                ->references('id')->on('articles')
                ->onDelete('restrict');
            
            $table->foreign('author_id')
                ->references('id')->on('authors')
                ->onDelete('restrict');


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
        Schema::drop('article_author');
    }
}
