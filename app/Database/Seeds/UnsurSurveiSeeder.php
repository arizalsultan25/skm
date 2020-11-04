<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UnsurSurveiSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'ref_id'    => '1',
				'survei_id' => '1'
			],
			[
				'ref_id'    => '2',
				'survei_id' => '2'
			],
			[
				'ref_id'    => '3',
				'survei_id' => '1'
			],

		];

		// Using Query Builder
		$this->db->table('survei-unsur')->insertBatch($data);
	}
}
