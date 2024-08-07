<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 30; $i++) {
            DB::table('admins')->insert([
                [
                    'name' => 'Admin ' . $i,
                    'email' => 'admin_' . $i . '@gmail.com',
                    'admin_group_id' => 1,
                    'email_verified_at' => now(),
                    'password' => Hash::make('1234'),   
                    'remember_token' => Str::random(10),
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]);
        }

        for ($i = 31; $i <= 60; $i++) {
            DB::table('admins')->insert([
                [
                    'name' => 'Admin ' . $i,
                    'email' => 'admin_' . $i . '@gmail.com',
                    'admin_group_id' => 2,
                    'email_verified_at' => now(),
                    'password' => Hash::make('1234'),   
                    'remember_token' => Str::random(10),
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]);
        }

        for ($i = 61; $i <= 100; $i++) {
            DB::table('admins')->insert([
                [
                    'name' => 'Admin ' . $i,
                    'email' => 'admin_' . $i . '@gmail.com',
                    'admin_group_id' => 3,
                    'status' => 0,
                    'email_verified_at' => now(),
                    'password' => Hash::make('1234'),   
                    'remember_token' => Str::random(10),
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]);
        }
    }
}
