<?php

use Illuminate\Database\Seeder;
use App\User;
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
        // hhh

        factory(User::class,10)->create();

        User::create([
            'email'     => 'admin@admin.com',
            'firstname' => 'admin',
            'lastname'  => 'admin',
            'username'  => 'admin',
            'country'   => 'EG',
            'phone'     => '201026051966',
            'role'      => 1,
            'password'  => Hash::make('admin1234')
        ]);
    }
}
