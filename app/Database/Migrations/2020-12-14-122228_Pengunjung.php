<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengunjung extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'email' => [
				'type'           => 'VARCHAR',
				'constraint'           => '255',
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => TRUE,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => TRUE,
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('pengunjung');
	}

	public function down()
	{
		$this->forge->dropTable('pengunjung');
	}
}
