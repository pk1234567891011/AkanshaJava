<?php

use Illuminate\Database\Seeder;

class userstable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

         'firstname'=>'Admin',
         'lastname'=>'admin',
         'email'=>'pk266394@gmail.com',
         'role_id'=>1,
         'password'=>bcrypt('admin123'),
        ]);
    }
}
