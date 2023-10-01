<?php

namespace Database\Seeders;

use App\Enums\ZonePreferencesTypesEnum;
use App\Models\Preferences;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Preferences::create([
            "zonePreference" => new ZonePreferencesTypesEnum(ZonePreferencesTypesEnum::IDistribution)
        ]);
    }
}
