<?php

namespace App\Database\Seeds;

class UnitSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'    => 'OPD 1'
            ],
            [
                'nama'    => 'OPD 2'
            ],
            [
                'nama'    => 'OPD 3'
            ],
            [
                'nama'    => 'OPD 4'
            ],
            [
                'nama'    => 'OPD 5'
            ],
        ];

        // Using Query Builder
        $this->db->table('unit-layanan')->insertBatch($data);
    }
}
