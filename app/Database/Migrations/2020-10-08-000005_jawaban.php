<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jawaban extends Migration
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
			'jawaban' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'bobot' => [
				'type'           => 'INT',
				'constraint'     => '11'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('ref_id', 'ref-unsur', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('jawaban');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('jawaban');
	}
}
