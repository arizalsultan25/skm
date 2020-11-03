<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UnitLayanan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'nama' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('unit-layanan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('unit-layanan');
	}
}
