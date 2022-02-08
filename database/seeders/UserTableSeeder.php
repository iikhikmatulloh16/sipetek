<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nik' => '3213141601980003',
                'name' => 'Iik Hikmatulloh',
                'email' => 'iikhikmatulloh99@gmail.com',
                'phone' => '089606998552',
                'role' => '1',
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),

            ]
        ]);
    }
}
