<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $roles = [
            'admin' => Role::firstOrCreate(['name' => 'admin']),
            'kasir' => Role::firstOrCreate(['name' => 'kasir']),
        ];

        $users = collect(range(1, 4))->map(function ($index) use ($faker, $roles) {
            return [
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => 'password',
                'role_id' => $index === 1 || $index === 4 ? $roles['admin']->id : $roles['kasir']->id,
            ];
        });

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => Hash::make($userData['password']),
                    'role_id' => $userData['role_id'],
                ]
            );
        }
    }
}
