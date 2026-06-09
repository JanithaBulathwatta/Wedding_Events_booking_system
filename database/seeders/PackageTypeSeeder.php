<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('package_type')->insert([
            ['name' => 'Basic Package'],
            ['name' => 'Silver Package'],
            ['name' => 'Gold Package'],
        ]);
    }
}
