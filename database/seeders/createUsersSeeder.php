<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
class CreateUsersSeeder extends Seeder
{
 
    public function run()
    {
        $user = [
            [
            'name' => 'isUser',
            'username' => 'isUser',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678'),
            'roles_id' => 2
            ],
            [
            'name' => 'isAdmin',
            'username' => 'isAdmin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'roles_id' => 1 
            ]
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
     }
}