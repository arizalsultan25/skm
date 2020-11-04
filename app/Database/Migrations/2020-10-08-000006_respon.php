<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Respon extends Migration
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
			'id_responded' => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true
			],
			'survei_id' => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true
			],
			'nilai' => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true
			]

		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('respon');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('respon');
	}
}
