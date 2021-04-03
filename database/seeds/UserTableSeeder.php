<?php

use Illuminate\Database\Seeder;
use App\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
        	'name'  => 'super admin',
        	'email' =>  'super_admin@gmail.com',
        	'password'  =>  bcrypt('akarid@123')
        ]);
        
         $user->attachRole('admin');
    }
}
