<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker\Factory::create();
        $roles = [
            'admin',
            'penarikan',
            'sampah',
            'setoran',
            'penjualan',
            'user',
        ];

        // Generate 50 realistic users
        for ($i = 0; $i < 50; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'jumlah_setoran' => rand(0, 1000),
                'jumlah_penarikan' => rand(0, 100),
                'saldo' => rand(0, 5000000),
            ]);

            // Assign random role
            $user = User::latest()->first();
            $user->assignRole($faker->randomElement($roles));
        }

        // Ensure admin user exists
        $adminUser = User::where('email', 'admin@banksampah.com')->first();
        if ($adminUser) {
            $adminUser->assignRole('super_admin');
        }
    }
}