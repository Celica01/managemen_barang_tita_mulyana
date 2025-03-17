<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::insert([
            ['level' => 'Admin'],
            ['level' => 'User'],
            ['level' => 'Manager'],
        ]);
    }
}