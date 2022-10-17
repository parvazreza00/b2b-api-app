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
        Schema::create('client_ledgers', function (Blueprint $table) {
            $table->id();
            $table->string('agentId', 100);
            $table->integer('deposit')->length(100)->unsigned();
            $table->integer('purchase')->length(100)->unsigned();
            $table->string('lastAmount', 100);
            $table->string('transactionId', 100);
            $table->string('details', 300);
            $table->string('reference', 100);
            $table->timestamp('dateTime')->default(DB::raw('CURRENT_TIMESTAMP'));           
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
        Schema::dropIfExists('client_ledgers');
    }
};
