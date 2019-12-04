<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$9H/btlP4nzCTv34wRLmzDeP.4EGRS.PJX/7IOXSEs.ThIAUdR0pSO',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
