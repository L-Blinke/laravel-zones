<?php

use App\Models\Zone;
use App\Enums\ZoneLogEnum;
use App\Enums\ZoneLogType;
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
        Schema::create('zone_logs', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ZoneLogEnum::getValues());
            $table->enum('typeFor', ZoneLogType::getValues());
            $table->foreignIdFor(Zone::class, 'zone_id');
            $table->foreignId('foreign_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zone_logs');
    }
};
