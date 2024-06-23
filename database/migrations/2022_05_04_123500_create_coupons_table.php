<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('course_id')->references('id')->on('courses')->onDelete('cascade');
            //$table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');            
            $table->integer('user_account_id')->nullable();
            $table->string('type')->default('free');
            $table->double('price',8,2);
            $table->string('status')->default('on');
            $table->dateTime('deadline');
            $table->dateTime('countdown_timer')->nullable();
            $table->integer('total_available');
            $table->integer('total_remaining')->nullable();
            $table->tinyInteger('available_on')->default(0);
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
        Schema::dropIfExists('coupons');
    }
}
