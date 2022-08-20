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
        Schema::create('negotiations', function (Blueprint $table) {
            $table->id('id_negotiation');
            $table->integer('id_user')->unsigned();
            $table->integer('id_iklan')->unsigned();
            $table->string('type');
            $table->string('advert_type');
            $table->string('meter');
            $table->string('year');
            $table->string('rate_negotiation');
            $table->string('status_negotiation');
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
        Schema::dropIfExists('negotiations');
    }
};
