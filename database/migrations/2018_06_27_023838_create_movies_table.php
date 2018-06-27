<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_vi')->unique();
            $table->string('title_en')->unique();
            $table->longText('content');
            $table->integer('time');
            $table->tinyInteger('status');
            $table->string('date_theater')->nullable();
            $table->string('quality');
            $table->string('resolution'); /* Do phan giai */
            $table->string('language');
            $table->string('company_production');
            $table->integer('view')->default(0);
            $table->string('meta_key')->nullable();
            $table->string('link_trailer')->nullable();

            $table->integer('link_download_id')->unsigned();
            $table->foreign('link_download_id')->references('id')->on('link_downloads');

            $table->integer('link_view_id');
            $table->foreign('link_view_id')->references('id')->on('link_views');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->integer('director_id')->unsigned();
            $table->foreign('director_id')->references('id')->on('directors');

            $table->integer('actor_id')->unsigned();
            $table->foreign('actor_id')->references('id')->on('actors');

            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');

            $table->integer('year_id')->unsigned();
            $table->foreign('year_id')->references('id')->on('years');

            $table->integer('comment_id')->unsigned();
            $table->foreign('comment_id')->references('id')->on('comments');

            $table->integer('rating_id')->unsigned();
            $table->foreign('rating_id')->references('id')->on('ratings');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('movies');
    }
}
