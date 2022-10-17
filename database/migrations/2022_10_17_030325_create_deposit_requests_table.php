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
        Schema::create('deposit_requests', function (Blueprint $table) {
            $table->id();
            $table->string('agentId', 200);
            $table->string('depositId', 100);
            $table->string('sender', 255);
            $table->string('reciever', 200);
            $table->string('paymentway', 100);
            $table->string('paymentmethod', 100);
            $table->string('transactionId', 100);
            $table->string('ref', 100);
            $table->integer('amount')->length(10)->unsigned();
            $table->string('attachment', 100);
            $table->timestamp('dateTime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('status', 00);
            $table->string('remarks', 500);            
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
        Schema::dropIfExists('deposit_requests');
    }
};
