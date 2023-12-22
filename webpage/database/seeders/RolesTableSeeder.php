<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name'=>'Admin',
            'slug'=>'admin',
            'user_id'=>1
        ]);

        DB::table('roles')->insert([
            'name'=>'Doctor',
            'slug'=>'doctor',
            'user_id'=>1
        ]);

        DB::table('roles')->insert([
            'name'=>'Assistant',
            'slug'=>'assistant',
            'user_id'=>1
        ]);

        DB::table('roles')->insert([
            'name'=>'Patient',
            'slug'=>'patient',
            'user_id'=>1
        ]);

        DB::table('roles')->insert([
            'name'=>'Department Head',
            'slug'=>'head_of_department',
            'user_id'=>1
        ]);
    }
}
