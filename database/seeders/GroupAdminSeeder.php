<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            DB::table('group_admins')->insert([
                [
                    'name' => 'Group Admin ' . $i,
                    'description' => 'description ' . $i,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]);
        }
    }
}
