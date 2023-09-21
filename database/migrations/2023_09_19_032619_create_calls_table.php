<?php

use App\Models\User;
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
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->foreignId('zone_id')->nullable();
            $table->foreignIdFor(User::class,'petitioner_id')->nullable();
            $table->string('resolutionStatus');
            $table->timestamps();
            $table->dateTimeTz('completionDate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calls');
    }
};
