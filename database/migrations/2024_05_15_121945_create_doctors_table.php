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
        Schema::create('doctors_list', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->string('name_pref', 100);
            $table->text('clinic_address');
            $table->text('contact');
            $table->text('email');
            $table->text('specialty_ids');
            $table->text('img_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
