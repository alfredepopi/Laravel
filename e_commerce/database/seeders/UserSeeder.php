<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([[
            'name'=>'epopi',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('Admin'),
            'role'=> 1
        ],
        [
            'name'=>'dong',
            'email'=>'user@gmail.com',
            'password'=>Hash::make('User'),
            'role'=> 0
        ],
    ]);
    }
}
