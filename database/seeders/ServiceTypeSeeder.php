<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('service_types')->insert([
            ['name' => 'ashtaka', 'display_name_si' => 'Ashtaka (අෂ්ටක)'],
            ['name' => 'decorations', 'display_name_si' => 'Poruwa & Decoration'],
            ['name' => 'dancing', 'display_name_si' => 'Traditional Dancing'],
            ['name' => 'photography', 'display_name_si' => 'Photography'],
            ['name' => 'drumming', 'display_name_si' => 'Udarata Bera'],
        ]);
    }
}
