<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengumuman extends Migration
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
			'judul_pengumuman' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'slug'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'isi_pengumuman' => [
				'type' => 'TEXT',
			],
			'file_pengumuman' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => true,
			],
			'path_pengumuman' => [
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
		$this->forge->createTable('pengumuman');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pengumuman');
	}
}
