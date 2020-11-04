<?php

namespace App\Database\Seeds;

class JawabanSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        // WebsiteSeeder, UnitSeeder, LayananSeeder, DomainSeeder, 
        // SurveiSeeder, RefUnsurSeeder, PertanyaanSeeder
        $data = [
            [
                'ref_id'    => '1',
                'jawaban' => 'tidak sesuai',
                'bobot' => '25'
            ],
            [
                'ref_id'    => '1',
                'jawaban' => 'kurang sesuai',
                'bobot' => '50'
            ],
            [
                'ref_id'    => '1',
                'jawaban' => 'sesuai',
                'bobot' => '75'
            ],
            [
                'ref_id'    => '1',
                'jawaban' => 'sangat sesuai',
                'bobot' => '100'
            ],
            [
                'ref_id'    => '2',
                'jawaban' => 'tidak mudah',
                'bobot' => '25'
            ],
            [
                'ref_id'    => '2',
                'jawaban' => 'kurang mudah',
                'bobot' => '50'
            ],
            [
                'ref_id'    => '2',
                'jawaban' => 'mudah',
                'bobot' => '75'
            ],
            [
                'ref_id'    => '2',
                'jawaban' => 'sangat mudah',
                'bobot' => '100'
            ],
            [
                'ref_id'    => '3',
                'jawaban' => 'tidak cepat',
                'bobot' => '25'
            ],
            [
                'ref_id'    => '3',
                'jawaban' => 'kurang cepat',
                'bobot' => '50'
            ],
            [
                'ref_id'    => '3',
                'jawaban' => 'cepat',
                'bobot' => '75'
            ],
            [
                'ref_id'    => '3',
                'jawaban' => 'sangat cepat',
                'bobot' => '100'
            ],

        ];

        // Using Query Builder
        $this->db->table('jawaban')->insertBatch($data);
    }
}
