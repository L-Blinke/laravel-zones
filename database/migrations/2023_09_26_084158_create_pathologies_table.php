<?php

use App\Models\ClinicalLog;
use App\Models\PathologyType;
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
        Schema::create('pathologies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ClinicalLog::class, 'clinical_log_id');
            $table->foreignIdFor(PathologyType::class, 'pathology_type_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pathologies');
    }
};
