<?php

namespace App\Database\Seeds;

class DomainSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'website_id'    => '1',
                'layanan_id'    => '1',
            ],
            [
                'website_id'    => '1',
                'layanan_id'    => '2',
            ],
            [
                'website_id'    => '2',
                'layanan_id'    => '3',
            ],
            [
                'website_id'    => '2',
                'layanan_id'    => '4',
            ],
            [
                'website_id'    => '3',
                'layanan_id'    => '5',
            ],
            [
                'website_id'    => '3',
                'layanan_id'    => '6',
            ],
            [
                'website_id'    => '4',
                'layanan_id'    => '7',
            ],
            [
                'website_id'    => '4',
                'layanan_id'    => '8',
            ],
            [
                'website_id'    => '5',
                'layanan_id'    => '9',
            ],
            [
                'website_id'    => '5',
                'layanan_id'    => '10',
            ]
        ];

        // Using Query Builder
        $this->db->table('domain-survei')->insertBatch($data);
    }
}
