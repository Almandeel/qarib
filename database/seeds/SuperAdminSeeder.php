<?php

use App\User;

use App\Market;
use App\Employee;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $market =   Market::create([
            'name'      => 'Customer Services',
            'address'   => 'Customer Services',
        ]);

        $superadmin = User::create([
            'phone'     => '0123456',
            'name'      => 'super',
            'address'   => 'super',
            'market_id' => $market->id,
            'password'  => bcrypt('123456'),
        ]);

        $superadmin->attachRole('superadmin');
    }
}
