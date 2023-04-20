<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users') -> insert([
            'name' => 'Alex Otwell',
            'email' => 'Otwell@email.com',
            'password' => '12345',
            'role' => 'Empleado',
            'department_id' => 1,
        ]);

        DB::table('users') -> insert([
            'name' => 'Camille Reis',
            'email' => 'Otwell@email.com',
            'password' => '12345',
            'role' => 'Gerente',
            'department_id' => 1,
        ]);

        DB::table('users') -> insert([
            'name' => 'David Rowe',
            'email' => 'Otwell@email.com',
            'password' => '12345',
            'role' => 'Empleado',
            'department_id' => 1,
        ]);

        DB::table('users') -> insert([
            'name' => 'Steve Palchuk',
            'email' => 'Otwell@email.com',
            'password' => '12345',
            'role' => 'Empleado',
            'department_id' => 1,
        ]);
    }
}
