<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pertanyaan extends Migration
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
			'ref_id' => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true
			],
			'pertanyaan' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('ref_id', 'ref-unsur', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('pertanyaan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pertanyaan');
	}
}
