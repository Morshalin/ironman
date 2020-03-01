<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('match_condition')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->unsignedBigInteger('studium_id')->nullable();
            $table->foreign('studium_id')->references('id')->on('studia')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('clubone_id')->nullable();
            $table->foreign('clubone_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->unsignedBigInteger('clubtwo_id')->nullable();
            $table->foreign('clubtwo_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->unsignedBigInteger('single_club')->nullable();
            $table->foreign('single_club')->references('id')->on('clubs')->onDelete('cascade');
            $table->date('event_start_date')->nullable();
            $table->date('event_end_date')->nullable();
            $table->text('video_link')->nullable();
            $table->text('detalis_link')->nullable();
            $table->date('match_start_date')->nullable();
            $table->date('match_end_date')->nullable();
            $table->string('score_one')->nullable();
            $table->string('score_two')->nullable();
            $table->text('title')->nullable();
            $table->text('title_slug')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('cover_image_tag')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('thumbnail_image_tag')->nullable();
            $table->longtext('description')->nullable();
            $table->text('schema')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('event_type')->nullable();
            $table->string('city_name')->nullable();
            $table->string('country_name')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('events');
    }
}
