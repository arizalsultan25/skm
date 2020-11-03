<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class SurveiSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'layanan_id'    => '1',
                'nama' => 'survei 1',
                'start' => Time::now('Asia/Jakarta', 'id'),
                'end' => Time::tomorrow('Asia/Jakarta', 'id')
            ],
            [
                'layanan_id'    => '2',
                'nama' => 'survei 2',
                'start' => Time::now('Asia/Jakarta', 'id'),
                'end' => Time::tomorrow('Asia/Jakarta', 'id')
            ],
            [
                'layanan_id'    => '3',
                'nama' => 'survei 3',
                'start' => Time::now('Asia/Jakarta', 'id'),
                'end' => Time::tomorrow('Asia/Jakarta', 'id')
            ],
            [
                'layanan_id'    => '4',
                'nama' => 'survei 4',
                'start' => Time::now('Asia/Jakarta', 'id'),
                'end' => Time::tomorrow('Asia/Jakarta', 'id')
            ],
            [
                'layanan_id'    => '5',
                'nama' => 'survei 5',
                'start' => Time::now('Asia/Jakarta', 'id'),
                'end' => Time::tomorrow('Asia/Jakarta', 'id')
            ],
            [
                'layanan_id'    => '6',
                'nama' => 'survei 6',
                'start' => Time::now('Asia/Jakarta', 'id'),
                'end' => Time::tomorrow('Asia/Jakarta', 'id')
            ],
            [
                'layanan_id'    => '7',
                'nama' => 'survei 7',
                'start' => Time::now('Asia/Jakarta', 'id'),
                'end' => Time::tomorrow('Asia/Jakarta', 'id')
            ],
            [
                'layanan_id'    => '8',
                'nama' => 'survei 8',
                'start' => Time::now('Asia/Jakarta', 'id'),
                'end' => Time::tomorrow('Asia/Jakarta', 'id')
            ],
            [
                'layanan_id'    => '9',
                'nama' => 'survei 9',
                'start' => Time::now('Asia/Jakarta', 'id'),
                'end' => Time::tomorrow('Asia/Jakarta', 'id')
            ],
            [
                'layanan_id'    => '10',
                'nama' => 'survei 10',
                'start' => Time::now('Asia/Jakarta', 'id'),
                'end' => Time::tomorrow('Asia/Jakarta', 'id')
            ],

        ];

        // Using Query Builder
        $this->db->table('survei')->insertBatch($data);
    }
}
