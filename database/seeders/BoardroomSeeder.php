<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('boardrooms') -> insert([
            'name' => 'Main hall',
            'capacity' => 24,
        ]);

        DB::table('boardrooms') -> insert([
            'name' => 'Atlas',
            'capacity' => 50,
        ]);
    }
}
