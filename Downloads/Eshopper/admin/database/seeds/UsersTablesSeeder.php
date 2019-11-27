<?php

use Illuminate\Database\Seeder;
use App\Users;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Users::create([
            'firstname'    => 'John',
            'lastname'    => 'Smith',
            'email'    => 'john_smith@gmail.com',
            'password'   =>  Hash::make('password'),
            
            'status'    => 'active',
            'role_id'    => 1,

        ]);
    }
}
