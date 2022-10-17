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
        Schema::create('controls', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('sabre')->length(1)->unsigned();
            $table->tinyInteger('galileo')->length(1)->unsigned();
            $table->tinyInteger('flyhub')->length(1)->unsigned();
            $table->tinyInteger('amadeus')->length(1)->unsigned();
            $table->integer('priority1')->length(100)->unsigned();
            $table->integer('priority2')->length(100)->unsigned();
            $table->integer('priority3')->length(10)->unsigned();           
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
        Schema::dropIfExists('controls');
    }
};
