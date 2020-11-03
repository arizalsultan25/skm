<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Layanan extends Migration
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
			'unit_id' => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true
			],
			'nama' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('unit_id', 'unit-layanan', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('layanan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('layanan');
	}
}
