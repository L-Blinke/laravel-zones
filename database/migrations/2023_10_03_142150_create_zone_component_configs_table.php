<?php

use App\Models\ZoneComponent;
use App\Enums\ZoneComponentConfigType;
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
        Schema::create('zone_component_configs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ZoneComponent::class);
            $table->enum('config_type', ZoneComponentConfigType::getValues());
            $table->string('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zone_component_configs');
    }
};
