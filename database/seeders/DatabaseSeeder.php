<?php

namespace Database\Seeders;

use App\Models\AnggotaKeluarga;
use App\Models\KartuKeluarga;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);

        $kartu_keluargas = [
            [
                'nomor_kk' => '330411',
                'dusun' => 'Gelang',
                'rt' => '01',
                'rw' => '01',
                'anggotas' => [
                    [
                        'nik' => '3304111',
                        'nama_lengkap' => 'Heraya',
                        'jenis_kelamin' => 'L',
                        'tanggal_lahir' => '2000-01-01',
                        'hubungan_dalam_keluarga' => 'Kepala Keluarga'
                    ],
                    [
                        'nik' => '3304112',
                        'nama_lengkap' => 'Fitra',
                        'jenis_kelamin' => 'P',
                        'tanggal_lahir' => '2000-01-02'
                    ],
                ]
            ],
            [
                'nomor_kk' => '330412',
                'dusun' => 'Gelang',
                'rt' => '01',
                'rw' => '02',
                'anggotas' => [
                    [
                        'nik' => '3304121',
                        'nama_lengkap' => 'Putra',
                        'jenis_kelamin' => 'L',
                        'tanggal_lahir' => '2000-01-03',
                        'hubungan_dalam_keluarga' => 'Kepala Keluarga'
                    ],
                    [
                        'nik' => '3304122',
                        'nama_lengkap' => 'Fitri',
                        'jenis_kelamin' => 'P',
                        'tanggal_lahir' => '2000-01-04'
                    ],
                ]
            ],
            [
                'nomor_kk' => '330413',
                'dusun' => 'Gelang',
                'rt' => '01',
                'rw' => '02',
                'anggotas' => []
            ],
            [
                'nomor_kk' => '330414',
                'dusun' => 'Gelang',
                'rt' => '01',
                'rw' => '02',
                'anggotas' => []
            ],
            [
                'nomor_kk' => '330415',
                'dusun' => 'Gelang',
                'rt' => '01',
                'rw' => '02',
                'anggotas' => []
            ],
            [
                'nomor_kk' => '330416',
                'dusun' => 'Gelang',
                'rt' => '01',
                'rw' => '02',
                'anggotas' => []
            ],
            [
                'nomor_kk' => '330417',
                'dusun' => 'Gelang',
                'rt' => '01',
                'rw' => '02',
                'anggotas' => []
            ],
            [
                'nomor_kk' => '330418',
                'dusun' => 'Gelang',
                'rt' => '01',
                'rw' => '02',
                'anggotas' => []
            ],
            [
                'nomor_kk' => '330419',
                'dusun' => 'Gelang',
                'rt' => '01',
                'rw' => '02',
                'anggotas' => []
            ],
            [
                'nomor_kk' => '330420',
                'dusun' => 'Gelang',
                'rt' => '01',
                'rw' => '02',
                'anggotas' => []
            ],
            [
                'nomor_kk' => '330421',
                'dusun' => 'Gelang',
                'rt' => '01',
                'rw' => '02',
                'anggotas' => []
            ],
            [
                'nomor_kk' => '330422',
                'dusun' => 'Gelang',
                'rt' => '01',
                'rw' => '02',
                'anggotas' => []
            ],
        ];

        foreach($kartu_keluargas as $kk){
            $anggotas = $kk['anggotas'];
            unset($kk['anggotas']);
            $nkk = new KartuKeluarga($kk);
            if($nkk->save()){
                foreach($anggotas as $anggota){
                    $naggota = new AnggotaKeluarga($anggota);
                    $naggota->nomor_kk = $nkk->nomor_kk;
                    $naggota->save();
                }
            }
        }
    }
}
