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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('agentId', 100);
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('password', 100);
            $table->string('phone', 100);
            $table->string('photo', 100);
            $table->timestamp('joinAt')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('status', 100);
            $table->string('company', 1000);
            $table->string('companyadd', 500);
            $table->string('companyImage', 500);
            $table->string('logo', 500);
            $table->string('logoPermission', 10);
            $table->string('markup', 10);            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
