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
			'pertanyaan_id' => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true
			],
			'jawaban' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'nilai' => [
				'type'           => 'INT',
				'constraint'     => '11'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('pertanyaan_id', 'pertanyaan', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('jawaban');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('jawaban');
	}
}
