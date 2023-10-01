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
        Schema::create('clinical_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('gender');
            $table->string('sex');
            $table->string('bornDate');
            $table->string('age');
            $table->string('address');
            $table->string('phone');
            $table->string('bloodGroup');
            $table->foreignId('medical_insurance_id');
            $table->string('emergencyPhone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinical_logs');
    }
};
