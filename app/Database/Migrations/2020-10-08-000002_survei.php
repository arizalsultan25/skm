<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Survei extends Migration
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
			'layanan_id' => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true
			],
			'nama' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'start' => [
				'type'           => 'DATETIME',
				'null'     => true
			],
			'end' => [
				'type'           => 'DATETIME',
				'null'     => true
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('layanan_id', 'layanan', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('survei');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('survei');
	}
}
