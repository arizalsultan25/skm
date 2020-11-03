<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DomainSurvei extends Migration
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
			'website_id' => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true
			],
			'layanan_id' => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('website_id', 'website', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('layanan_id', 'layanan', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('domain-survei');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('domain-survei');
	}
}
