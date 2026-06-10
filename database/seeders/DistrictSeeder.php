<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = [
            ['id' => 1, 'name' => 'Ampara'],
            ['id' => 2, 'name' => 'Anuradhapura'],
            ['id' => 3, 'name' => 'Badulla'],
            ['id' => 4, 'name' => 'Batticaloa'],
            ['id' => 5, 'name' => 'Colombo'],
            ['id' => 6, 'name' => 'Galle'],
            ['id' => 7, 'name' => 'Gampaha'],
            ['id' => 8, 'name' => 'Hambantota'],
            ['id' => 9, 'name' => 'Jaffna'],
            ['id' => 10, 'name' => 'Kalutara'],
            ['id' => 11, 'name' => 'Kandy'],
            ['id' => 12, 'name' => 'Kegalle'],
            ['id' => 13, 'name' => 'Kilinochchi'],
            ['id' => 14, 'name' => 'Kurunegala'],
            ['id' => 15, 'name' => 'Mannar'],
            ['id' => 16, 'name' => 'Matale'],
            ['id' => 17, 'name' => 'Matara'],
            ['id' => 18, 'name' => 'Moneragala'],
            ['id' => 19, 'name' => 'Mullaitivu'],
            ['id' => 20, 'name' => 'Nuwaraliya'],
            ['id' => 21, 'name' => 'Polonnaruwa'],
            ['id' => 22, 'name' => 'Puttalam'],
            ['id' => 23, 'name' => 'Ratnapura'],
            ['id' => 24, 'name' => 'Trincomalee'],
            ['id' => 25, 'name' => 'Vavuniya'],
        ];
        DB::table('districts')->insert($districts);
    }
}
