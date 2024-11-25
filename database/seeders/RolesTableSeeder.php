<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'roleID' => 1,
            'namaRole' => 'Admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}