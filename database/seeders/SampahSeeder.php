<?php

namespace Database\Seeders;

use App\Models\Sampah;
use Illuminate\Database\Seeder;

class SampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampahs = [
            // Sampah Organik
            [
                'jenis' => 'organik',
                'nama' => 'Sisa Makanan',
                'satuan' => 'kg',
                'harga' => '1500',
            ],
            [
                'jenis' => 'organik',
                'nama' => 'Daun Kering',
                'satuan' => 'kg',
                'harga' => '1000',
            ],
            [
                'jenis' => 'organik',
                'nama' => 'Kulit Buah',
                'satuan' => 'kg',
                'harga' => '1200',
            ],
            [
                'jenis' => 'organik',
                'nama' => 'Ranting Kayu',
                'satuan' => 'kg',
                'harga' => '800',
            ],
            
            // Sampah Non-Organik
            [
                'jenis' => 'none-organik',
                'nama' => 'Botol Plastik',
                'satuan' => 'pcs',
                'harga' => '2000',
            ],
            [
                'jenis' => 'none-organik',
                'nama' => 'Kardus',
                'satuan' => 'kg',
                'harga' => '3000',
            ],
            [
                'jenis' => 'none-organik',
                'nama' => 'Kaleng Aluminium',
                'satuan' => 'kg',
                'harga' => '15000',
            ],
            [
                'jenis' => 'none-organik',
                'nama' => 'Kertas Koran',
                'satuan' => 'kg',
                'harga' => '2500',
            ],
            [
                'jenis' => 'none-organik',
                'nama' => 'Botol Kaca',
                'satuan' => 'pcs',
                'harga' => '1500',
            ],
            [
                'jenis' => 'none-organik',
                'nama' => 'Plastik Kemasan',
                'satuan' => 'kg',
                'harga' => '2800',
            ],
            [
                'jenis' => 'none-organik',
                'nama' => 'Logam Besi',
                'satuan' => 'kg',
                'harga' => '5000',
            ],
            [
                'jenis' => 'none-organik',
                'nama' => 'Kertas HVS',
                'satuan' => 'kg',
                'harga' => '3500',
            ],
        ];

        foreach ($sampahs as $sampah) {
            Sampah::create($sampah);
        }
    }
}
