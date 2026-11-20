<?php

namespace Database\Seeders;

use App\Models\Penjualan;
use App\Models\Sampah;
use Illuminate\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampahs = Sampah::all();

        if ($sampahs->count() == 0) {
            return;
        }

        $penjualans = [
            [
                'sampah_id' => $sampahs->where('nama', 'Botol Plastik')->first()->id,
                'berat' => '50',
                'pembeli' => 'CV. Plastik Jaya',
                'kontak' => '081234567890',
                'harga' => 2000,
                'total' => 100000,
            ],
            [
                'sampah_id' => $sampahs->where('nama', 'Kardus')->first()->id,
                'berat' => '25',
                'pembeli' => 'UD. Kertas Sejahtera',
                'kontak' => '081234567891',
                'harga' => 3000,
                'total' => 75000,
            ],
            [
                'sampah_id' => $sampahs->where('nama', 'Kaleng Aluminium')->first()->id,
                'berat' => '15',
                'pembeli' => 'PT. Logam Mulia',
                'kontak' => '081234567892',
                'harga' => 15000,
                'total' => 225000,
            ],
            [
                'sampah_id' => $sampahs->where('nama', 'Kertas Koran')->first()->id,
                'berat' => '30',
                'pembeli' => 'Toko Kertas Maju',
                'kontak' => '081234567893',
                'harga' => 2500,
                'total' => 75000,
            ],
            [
                'sampah_id' => $sampahs->where('nama', 'Plastik Kemasan')->first()->id,
                'berat' => '20',
                'pembeli' => 'CV. Daur Ulang Sukses',
                'kontak' => '081234567894',
                'harga' => 2800,
                'total' => 56000,
            ],
            [
                'sampah_id' => $sampahs->where('nama', 'Logam Besi')->first()->id,
                'berat' => '18',
                'pembeli' => 'UD. Besi Tua Makmur',
                'kontak' => '081234567895',
                'harga' => 5000,
                'total' => 90000,
            ],
            [
                'sampah_id' => $sampahs->where('nama', 'Kertas HVS')->first()->id,
                'berat' => '12',
                'pembeli' => 'CV. Kertas Bersih',
                'kontak' => '081234567896',
                'harga' => 3500,
                'total' => 42000,
            ],
            [
                'sampah_id' => $sampahs->where('nama', 'Botol Kaca')->first()->id,
                'berat' => '40',
                'pembeli' => 'PT. Kaca Bening',
                'kontak' => '081234567897',
                'harga' => 1500,
                'total' => 60000,
            ],
            [
                'sampah_id' => $sampahs->where('nama', 'Botol Plastik')->first()->id,
                'berat' => '60',
                'pembeli' => 'UD. Plastik Sejahtera',
                'kontak' => '081234567898',
                'harga' => 2000,
                'total' => 120000,
            ],
            [
                'sampah_id' => $sampahs->where('nama', 'Kardus')->first()->id,
                'berat' => '35',
                'pembeli' => 'PT. Papan Kertas Indonesia',
                'kontak' => '081234567899',
                'harga' => 3000,
                'total' => 105000,
            ],
        ];

        foreach ($penjualans as $penjualan) {
            Penjualan::create($penjualan);
        }
    }
}