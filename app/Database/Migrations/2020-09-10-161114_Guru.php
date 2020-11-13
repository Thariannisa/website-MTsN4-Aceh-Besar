<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Guru extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'userId' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],

			'nip' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'Mata_Pelajaran' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'path' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => true,
			],
			'Jabatan' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'Status_Kepegawaian' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true,
			]
		]);
		$this->forge->addField('CONSTRAINT FOREIGN KEY (userId) REFERENCES users(id)');
		$this->forge->addKey('id', true);
		$this->forge->createTable('guru');
	}

	public function down()
	{
		$this->forge->dropTable('guru');
	}
}
