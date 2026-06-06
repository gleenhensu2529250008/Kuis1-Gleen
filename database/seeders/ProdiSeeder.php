<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodis = [
            [
                'nama_prodi' => 'Pendidikan Dokter',
                'nama_kaprodi' => 'Dr. Hutama'
            ],
             [
                'nama_prodi' => 'Pendidikan Hukum',
                'nama_kaprodi' => 'Dr. Darren'
            ]
        ];

        foreach($prodis as $prodi){
            $fakultasId = Fakultas::inRandomOrder()->first()->id;

            $prodi['fakultas_id'] = $fakultasId;
            Prodi::create($prodi);
        }
    }
}
