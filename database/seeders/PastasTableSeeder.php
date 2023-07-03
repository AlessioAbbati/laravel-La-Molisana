<?php

namespace Database\Seeders;

use App\Models\Pasta;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PastasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('pastas') as $pasta) {

            Pasta::create($pasta);
        }
        
    }
}
