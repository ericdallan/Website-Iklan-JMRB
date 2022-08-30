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
        Schema::create('replays', function (Blueprint $table) {
            $table->id('id_replay');
            $table->integer('id_forum')->unsigned();
            $table->integer('id_user')->unsigned()->nullable();
            $table->integer('id_admin')->unsigned()->nullable();
            $table->string('owner_reply');
            $table->string('reply_body');
            $table->string('reply_pict',1000)->nullable();
            $table->string('time_reply');
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
        Schema::dropIfExists('replays');
    }
};
