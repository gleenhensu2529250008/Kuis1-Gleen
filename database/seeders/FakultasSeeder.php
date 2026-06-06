<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fakultas;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakultas = [
            [
                'name' => 'Fakultas Teknik',
                'dekan' => 'Prof. Dr. Ir. Ahmad Budiman, M.T.'
            ],
            [
                'name' => 'Fakultas Ekonomi dan Bisnis',
                'dekan' => 'Prof. Dr. Alin'
            ]
        ];
        Fakultas::fillAndInsert($fakultas);
    }
}
