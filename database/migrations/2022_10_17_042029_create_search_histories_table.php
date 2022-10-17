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
        Schema::create('search_histories', function (Blueprint $table) {
            $table->id();
            $table->string('searchId', 100);
            $table->string('agentId', 100);
            $table->string('searchtype', 100);
            $table->string('DepFrom', 100);
            $table->string('ArrTo', 100);
            $table->string('class', 100);
            $table->timestamp('searchTime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('depTime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('adult')->length(10)->unsigned();
            $table->integer('child')->length(10)->unsigned();
            $table->integer('infant')->length(10)->unsigned();
            $table->timestamp('returnTime')->default(DB::raw('CURRENT_TIMESTAMP'));            
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
        Schema::dropIfExists('search_histories');
    }
};
