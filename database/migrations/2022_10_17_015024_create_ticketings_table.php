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
        Schema::create('ticketings', function (Blueprint $table) {
            $table->id();
            $table->string('invoiceId', 100);
            $table->string('agentId', 100);
            $table->string('BookingId', 100);
            $table->string('stuffId', 100);
            $table->string('route', 100);
            $table->string('cost', 100);
            $table->string('type', 100);
            $table->string('airlines', 100);
            $table->string('issueTime', 100);
            $table->string('status', 100);            
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
        Schema::dropIfExists('ticketings');
    }
};
