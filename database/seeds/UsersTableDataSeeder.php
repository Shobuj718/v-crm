<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'uid' => uniqid(time()),
            'username' => 'shobuj',
            'email' => 'shobuj@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'superadmin',
            'status' => 'active',
        ]);
    }
}
