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
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();
            $table->string('agentId', 100);
            $table->string('BookingId', 100);
            $table->string('fname', 100);
            $table->string('lname', 100);
            $table->date('dob');
            $table->string('type', 100);
            $table->string('nationality', 100);
            $table->string('passportno', 100);
            $table->date('passexpireDate');
            $table->string('phone', 15);
            $table->string('email', 100);
            $table->string('address', 200);
            $table->string('gender', 100);                      
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
        Schema::dropIfExists('passengers');
    }
};
