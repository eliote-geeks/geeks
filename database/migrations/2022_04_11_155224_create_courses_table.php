<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('title');
            $table->string('level');
            $table->longText('description');
            $table->double('discount_price',10,2);
            $table->double('actual_price',10,2);
            $table->string('video_url');
            $table->integer('view_count')->default(0);
            $table->integer('subscriber_count');
            $table->integer('status')->default(0);
            $table->string('photo')->nullable();
            $table->text('short_description')->nullable();
            $table->text('summary')->nullable();
            $table->text('requirements')->nullable();
            $table->string('target_student')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('courses');
    }
}
