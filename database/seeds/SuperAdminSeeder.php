<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Employee;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $superadmin = User::create([
            'username' => 'super',
            'email' => 'super@admin.com',
            'password' => bcrypt('123456'),
        ]);

        $superadmin->attachRole('superadmin');
    }
}
