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
        Schema::create('group_fares', function (Blueprint $table) {
            $table->id();
            $table->string('groupId', 100);
            $table->integer('segment')->length(10)->unsigned();
            $table->string('career', 10);
            $table->integer('BasePrice')->length(10)->unsigned();
            $table->integer('Taxes')->length(10)->unsigned();
            $table->integer('price')->length(10)->unsigned();
            $table->string('departure1', 100);
            $table->string('departure2', 100);
            $table->string('departure3', 100);
            $table->string('depTime1', 100);
            $table->string('depTime2', 100);
            $table->string('depTime3', 100);
            $table->string('arrival1', 100);
            $table->string('arrival2', 100);
            $table->string('arrival3', 100);
            $table->string('arrTime1', 100);
            $table->string('arrTime2', 100);
            $table->string('arrTime3', 100);
            $table->integer('seat')->length(10)->unsigned();
            $table->integer('bags')->length(10)->unsigned();
            $table->integer('flightNum1')->length(10)->unsigned();
            $table->integer('flightNum2')->length(10)->unsigned();
            $table->integer('flightNum3')->length(10)->unsigned();
            $table->integer('transit1')->length(10)->unsigned();
            $table->integer('transit2')->length(10)->unsigned();            
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
        Schema::dropIfExists('group_fares');
    }
};
