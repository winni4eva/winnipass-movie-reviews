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
        $roles = [
            User::DEFAULT_USER,
            User::ADMIN_USER
        ];

        foreach ($roles as $role) {
            factory(User::class)->create(
                ['admin' => $role]
            );
        }
    }
}
