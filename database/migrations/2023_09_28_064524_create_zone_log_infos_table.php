<?php

use App\Enums\ZoneLogType;
use App\Models\ZoneLog;
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
        Schema::create('zone_log_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ZoneLog::class, 'zone_log_id');
            $table->string('info');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zone_log_infos');
    }
};
