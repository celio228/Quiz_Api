<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Admin Quiz',
                'email' => 'admin@quiz.com',
                'points' => 0,
            ],
            [
                'name' => 'Test User',
                'email' => 'test@quiz.com', 
                'points' => 0,
            ],
            [
                'name' => 'John Doe',
                'email' => 'john@quiz.com',
                'points' => 0,
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        $this->command->info('✅ Utilisateurs de test créés avec succès!');
    }
}