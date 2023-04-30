<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reclamation; 

class ReclamationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate 10 dummy reclamations
        for ($i = 1; $i <= 10; $i++) {
            Reclamation::create([
        
                'phone' => 'This is a sample description for Reclamation '.$i,
                'name' => 'name'.$i,
                'lastname' => 'lastname'.$i,
                'state' => 'state'.$i,
                'phone' => '56523400'.$i,
                'email' => 'Email'.$i,
                'type' => 'type'.$i,
                'message' => 'message'.$i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
