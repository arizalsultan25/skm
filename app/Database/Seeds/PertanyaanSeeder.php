<?php

namespace App\Database\Seeds;

class PertanyaanSeeder extends \CodeIgniter\Database\Seeder
{
	public function run()
	{
		$data = [
			[
				'ref_id'    => '1',
				'pertanyaan' => 'Pertanyaan tentang persyaratan 1'
			],
			[
				'ref_id'    => '1',
				'pertanyaan' => 'Pertanyaan tentang persyaratan 2'
			],
			[
				'ref_id'    => '1',
				'pertanyaan' => 'Pertanyaan tentang persyaratan 3'
			],
			[
				'ref_id'    => '2',
				'pertanyaan' => 'Pertanyaan tentang Sistem, Mekanisme, dan Prosedur 1'
			],
			[
				'ref_id'    => '2',
				'pertanyaan' => 'Pertanyaan tentang Sistem, Mekanisme, dan Prosedur 2'
			],
			[
				'ref_id'    => '2',
				'pertanyaan' => 'Pertanyaan tentang Sistem, Mekanisme, dan Prosedur 3'
			],
			[
				'ref_id'    => '3',
				'pertanyaan' => 'Pertanyaan tentang Waktu Penyelesaian 1'
			],
			[
				'ref_id'    => '3',
				'pertanyaan' => 'Pertanyaan tentang Waktu Penyelesaian 1'
			],
			[
				'ref_id'    => '3',
				'pertanyaan' => 'Pertanyaan tentang Waktu Penyelesaian 1'
			],
		];

		// Using Query Builder
		$this->db->table('pertanyaan')->insertBatch($data);
	}
}
