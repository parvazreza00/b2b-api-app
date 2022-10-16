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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('BookingId', 100);
            $table->string('agentId', 100);
            $table->string('email', 100);
            $table->string('phone', 100);
            $table->string('name', 100);
            $table->string('pnr', 100);
            $table->string('tripType', 100);
            $table->integer('pax')->length(100)->unsigned();
            $table->integer('adultCount')->length(10)->unsigned();
            $table->integer('childCount')->length(10)->unsigned();
            $table->integer('infantCount')->length(10)->unsigned();
            $table->integer('netCost')->length(100)->unsigned();
            $table->integer('adultCostBase')->length(100)->unsigned();
            $table->integer('childCostBase')->length(100)->unsigned();
            $table->integer('infantCostBase')->length(100)->unsigned();
            $table->integer('adultCostTax')->length(10)->unsigned();
            $table->integer('childCostTax')->length(10)->unsigned();
            $table->integer('infantCostTax')->length(10)->unsigned();
            $table->integer('grossCost')->length(100)->unsigned();
            $table->integer('baseFare')->length(11)->unsigned();
            $table->integer('Tax')->length(10)->unsigned();
            $table->string('deptFrom', 100);
            $table->string('airlines', 100);
            $table->string('arriveTo', 100);
            $table->string('gds', 100);
            $table->string('status', 100);
            $table->string('dateTime', 100);
            $table->string('issueTime', 100);
            $table->string('timeLimit', 100);            
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
        Schema::dropIfExists('bookings');
    }
};
