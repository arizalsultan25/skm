<?php

namespace App\Database\Seeds;

class RefUnsurSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'    => 'Persyaratan'
            ],
            [
                'nama'    => 'Sistem, Mekanisme, dan Prosedur'
            ],
            [
                'nama'    => 'Waktu Penyelesaian'
            ],
            [
                'nama'    => 'Biaya/Tarif'
            ],
            [
                'nama'    => 'Produk Spesifikasi Jenis Pelayanan'
            ],
            [
                'nama'    => 'Kompetensi Pelaksana'
            ],
            [
                'nama'    => 'Perilaku Pelaksana'
            ],
            [
                'nama'    => 'Penanganan Pengaduan, Saran dan Masukan'
            ],
            [
                'nama'    => 'Sarana dan Prasarana'
            ],

        ];

        // Using Query Builder
        $this->db->table('ref-unsur')->insertBatch($data);
    }
}
