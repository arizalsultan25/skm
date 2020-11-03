<?php

namespace App\Database\Seeds;

class LayananSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'unit_id'    => '1',
                'nama' => "layanan 1"
            ],
            [
                'unit_id'    => '1',
                'nama' => "layanan 2"
            ],
            [
                'unit_id'    => '2',
                'nama' => "layanan 3"
            ],
            [
                'unit_id'    => '2',
                'nama' => "layanan 4"
            ],
            [
                'unit_id'    => '3',
                'nama' => "layanan 5"
            ],
            [
                'unit_id'    => '3',
                'nama' => "layanan 6"
            ],
            [
                'unit_id'    => '4',
                'nama' => "layanan 7"
            ],
            [
                'unit_id'    => '4',
                'nama' => "layanan 8"
            ],
            [
                'unit_id'    => '5',
                'nama' => "layanan 9"
            ],
            [
                'unit_id'    => '5',
                'nama' => "layanan 10"
            ],
        ];

        // Using Query Builder
        $this->db->table('layanan')->insertBatch($data);
    }
}
