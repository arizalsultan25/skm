<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserOpd extends Migration
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
			'email' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
				'unique'         => true
			],
			'api-key' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
				'unique'         => true
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('user-opd');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('user-opd');
	}
}
