<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prestasi extends Migration
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
			'judul_prestasi' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'slug'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'kategori' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'isi_prestasi' => [
				'type' => 'TEXT',
			],
			'path_prestasi' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => true,
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
		$this->forge->createTable('prestasi');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('prestasi');
	}
}
