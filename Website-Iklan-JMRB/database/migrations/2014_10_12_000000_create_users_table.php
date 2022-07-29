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
            $table->id('id_user');
            $table->string('username',255);
            $table->string('email');
            $table->string('password');
            $table->string('first_name')->nullable();   
            $table->string('last_name')->nullable();
            $table->string('company_name');
            $table->string('company_desc')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('pic_profile',1000)->nullable();
            $table->string('company_address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('Tenant');
    }
};
