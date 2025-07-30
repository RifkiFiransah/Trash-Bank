<?php

namespace Database\Seeders;

use App\Models\Penarikan;
use App\Models\User;
use Illuminate\Database\Seeder;

class PenarikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        if ($users->count() == 0) {
            return;
        }

        $penarikans = [
            [
                'user_id' => $users->random()->id,
                'nama' => 'Penarikan Saldo Bulanan',
                'jumlah' => 50000,
            ],
            [
                'user_id' => $users->random()->id,
                'nama' => 'Penarikan Darurat',
                'jumlah' => 25000,
            ],
            [
                'user_id' => $users->random()->id,
                'nama' => 'Penarikan Tabungan',
                'jumlah' => 75000,
            ],
            [
                'user_id' => $users->random()->id,
                'nama' => 'Penarikan Bonus',
                'jumlah' => 30000,
            ],
            [
                'user_id' => $users->random()->id,
                'nama' => 'Penarikan Mingguan',
                'jumlah' => 15000,
            ],
            [
                'user_id' => $users->random()->id,
                'nama' => 'Penarikan Hasil Setoran',
                'jumlah' => 40000,
            ],
            [
                'user_id' => $users->random()->id,
                'nama' => 'Penarikan Semester',
                'jumlah' => 100000,
            ],
            [
                'user_id' => $users->random()->id,
                'nama' => 'Penarikan Khusus',
                'jumlah' => 20000,
            ],
        ];

        foreach ($penarikans as $penarikan) {
            Penarikan::create($penarikan);
        }
    }
}
