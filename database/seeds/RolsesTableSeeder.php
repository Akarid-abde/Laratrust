<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Role;

class RolsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = \App\Role::create([
        	'name'  => 'supper_admin',
        	'display_name' => 'super_admin',
        	'description' => 'do any thing'
        ]);

         $admin = \App\Role::create([
            'name'  => 'admin',
            'display_name' => 'admin',
            'description' => 'do any thing'
        ]);

        $client = \App\Role::create([
        	'name'  => 'client',
        	'display_name' => 'client',
        	'description' => 'can do specifique task'
        ]);
    }
}
