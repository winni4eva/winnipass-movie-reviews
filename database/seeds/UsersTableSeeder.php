<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'chloe',
                'email' => 'chloe@gmail.com',
                'admin' => User::DEFAULT_USER,
            ],
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'admin' => User::ADMIN_USER
            ]
        ];

        foreach ($users as $user) {
            factory(User::class)->create($user);
        }
    }
}
