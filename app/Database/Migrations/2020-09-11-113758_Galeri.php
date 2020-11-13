<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Galeri extends Migration
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
			'categoryId' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'judul_gambar' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'path_gambar' => [
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
		$this->forge->addField('CONSTRAINT FOREIGN KEY (categoryId) REFERENCES kategoris(id)');
		$this->forge->addKey('id', true);
		$this->forge->createTable('galeri');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('galeri');
	}
}
