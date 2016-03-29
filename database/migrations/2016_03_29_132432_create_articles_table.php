<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('content');
            /*$table->foreign('publisher_id')
                ->references('id')->on('publishers')
                ->onDelete('cascade');
            $table->timestamps();
        });*/

        Schema::table('articles', function ($table) {
            $table->foreign('publisher_id')
                ->references('id')->on('publishers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
