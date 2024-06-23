<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->default('male');
            $table->string('email')->unique();
            $table->string('profile_photo_path')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->tinyInteger('is_subscribed')->nullable()->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();    
            $table->string('number')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();                        
            $table->integer('github_id')->nullable();                        
            $table->integer('facebook_id')->nullable();                        
            $table->integer('google_id')->nullable();                        
            $table->longText('github_token')->nullable();                        
            $table->longText('facebook_token')->nullable();                        
            $table->longText('google_token')->nullable();          
            $table->string('state')->nullable();            
            $table->string('country')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('user_type')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
