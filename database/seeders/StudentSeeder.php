<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            'id' => 1,
            'nama' => 'Rafi',
            'nis' => '123456',
            'umur' => 17,
            'alamat' => 'Bumi',
            'jeniskelamin' => 'pria',
            'class_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
