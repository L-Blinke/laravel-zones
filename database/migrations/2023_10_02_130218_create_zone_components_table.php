<?php

use App\Models\Dashboard;
use App\Enums\ComponentType;
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
        Schema::create('zone_components', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Dashboard::class);
            $table->enum('type', ComponentType::getValues());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zone_components');
    }
};
