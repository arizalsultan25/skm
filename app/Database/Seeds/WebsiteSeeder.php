<?php

namespace App\Database\Seeds;

class WebsiteSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        // WebsiteSeeder, UnitSeeder, LayananSeeder, DomainSeeder, 
        // SurveiSeeder, RefUnsurSeeder, PertanyaanSeeder, JawabanSeeder,
        // UnsurSurveiSeeder
        $data = [
            [
                'domain'    => 'batam.go.id'
            ],
            [
                'domain'    => 'sikesda.batam.go.id'
            ],
            [
                'domain'    => 'ptsp.batam.go.id'
            ],
            [
                'domain'    => 'apekesah.batam.go.id'
            ],
            [
                'domain'    => 'direktori.batam.go.id'
            ],
        ];

        // Using Query Builder
        $this->db->table('website')->insertBatch($data);
    }
}
