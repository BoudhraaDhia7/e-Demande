<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    public function run()
    {
        DB::table('materials')->insert([
            ['name' => 'voiture'],
            ['name' => 'camera'],
            ['name' => 'cable'],
            ['name' => 'voltmétre'],
        ]);
    }
}