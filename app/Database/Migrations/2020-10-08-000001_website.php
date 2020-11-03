<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Website extends Migration
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
			'domain' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
				'unique'         => true
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('website');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('website');
	}
}
