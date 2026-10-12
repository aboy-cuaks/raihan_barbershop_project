<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed sample records for local development and screenshot preparation.
     * Replace these examples with the real data used by the business.
     */
    public function run(): void
    {
        $this->call(MasterDataDemoSeeder::class);
    }
}
