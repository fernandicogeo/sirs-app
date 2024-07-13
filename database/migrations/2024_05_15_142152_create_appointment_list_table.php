<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointment_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('doctor_id');
            $table->string('patient_id');
            $table->string('schedule');
            $table->tinyInteger('status')->default(0)->comment('0= for verification, 1=confirmed,2= reschedule,3=done');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_list');
    }
};
