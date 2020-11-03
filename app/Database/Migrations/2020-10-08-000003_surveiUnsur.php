<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SurveiUnsur extends Migration
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
			'survei_id' => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('ref_id', 'ref-unsur', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('survei_id', 'survei', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('survei-unsur');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('survei-unsur');
	}
}
