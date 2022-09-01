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
        Schema::create('iklans', function (Blueprint $table) {
            $table->id('id_iklan');
            $table->integer('id_user')->unsigned();
            $table->string('name');
            $table->string('zone');
            $table->string('location');
            $table->string('maps_coord');
            $table->string('survey_date')->nullable();
            $table->string('pic_advert',1000)->nullable();
            $table->string('status');
            $table->string('ba_survey',10000)->nullable();
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
        Schema::dropIfExists('iklans');
    }
};
