<?php

namespace Database\Seeders;

use App\Models\Setoran;
use App\Models\User;
use App\Models\Sampah;
use Illuminate\Database\Seeder;

class SetoranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $sampahs = Sampah::all();

        if ($users->count() == 0 || $sampahs->count() == 0) {
            return;
        }

        $setorans = [
            [
                'user_id' => $users->random()->id,
                'sampah_id' => $sampahs->where('nama', 'Botol Plastik')->first()->id,
                'berat' => '5',
                'total' => '10000',
            ],
            [
                'user_id' => $users->random()->id,
                'sampah_id' => $sampahs->where('nama', 'Kardus')->first()->id,
                'berat' => '3',
                'total' => '9000',
            ],
            [
                'user_id' => $users->random()->id,
                'sampah_id' => $sampahs->where('nama', 'Kaleng Aluminium')->first()->id,
                'berat' => '2',
                'total' => '30000',
            ],
            [
                'user_id' => $users->random()->id,
                'sampah_id' => $sampahs->where('nama', 'Kertas Koran')->first()->id,
                'berat' => '4',
                'total' => '10000',
            ],
            [
                'user_id' => $users->random()->id,
                'sampah_id' => $sampahs->where('nama', 'Sisa Makanan')->first()->id,
                'berat' => '6',
                'total' => '9000',
            ],
            [
                'user_id' => $users->random()->id,
                'sampah_id' => $sampahs->where('nama', 'Botol Kaca')->first()->id,
                'berat' => '8',
                'total' => '12000',
            ],
            [
                'user_id' => $users->random()->id,
                'sampah_id' => $sampahs->where('nama', 'Plastik Kemasan')->first()->id,
                'berat' => '3.5',
                'total' => '9800',
            ],
            [
                'user_id' => $users->random()->id,
                'sampah_id' => $sampahs->where('nama', 'Logam Besi')->first()->id,
                'berat' => '2.5',
                'total' => '12500',
            ],
            [
                'user_id' => $users->random()->id,
                'sampah_id' => $sampahs->where('nama', 'Daun Kering')->first()->id,
                'berat' => '10',
                'total' => '10000',
            ],
            [
                'user_id' => $users->random()->id,
                'sampah_id' => $sampahs->where('nama', 'Kertas HVS')->first()->id,
                'berat' => '2',
                'total' => '7000',
            ],
            [
                'user_id' => $users->random()->id,
                'sampah_id' => $sampahs->where('nama', 'Botol Plastik')->first()->id,
                'berat' => '7',
                'total' => '14000',
            ],
            [
                'user_id' => $users->random()->id,
                'sampah_id' => $sampahs->where('nama', 'Kaleng Aluminium')->first()->id,
                'berat' => '1.5',
                'total' => '22500',
            ],
            [
                'user_id' => $users->random()->id,
                'sampah_id' => $sampahs->where('nama', 'Kertas Koran')->first()->id,
                'berat' => '5',
                'total' => '12500',
            ],
            [
                'user_id' => $users->random()->id,
                'sampah_id' => $sampahs->where('nama', 'Sisa Makanan')->first()->id,
                'berat' => '4.5',
                'total' => '8100',
            ],
            [
                'user_id' => $users->random()->id,
                'sampah_id' => $sampahs->where('nama', 'Botol Kaca')->first()->id,
                'berat' => '10',
                'total' => '15000',
            ],
        ];

        foreach ($setorans as $setoran) {
            Setoran::create($setoran);
        }
    }
}