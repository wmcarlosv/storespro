<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Carlos Vargas',
            'email'=>'wmcarlosv@gmail.com',
            'password'=>bcrypt('Car2244los*'),
            'rut'=>'19455541',
            'phone'=>'584245093801',
            'status'=>'active'
        ]);
    }
}
