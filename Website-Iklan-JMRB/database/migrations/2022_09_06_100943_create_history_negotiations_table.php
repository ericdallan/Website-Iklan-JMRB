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
        Schema::create('history_negotiations', function (Blueprint $table) {
            $table->id('id_history');
            $table->integer('id_negotiation')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->string('HistoryRate_negotiation');
            $table->string('HistoryStatus_negotiation');
            $table->string('time');
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
        Schema::dropIfExists('history_negotiations');
    }
};
