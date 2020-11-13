<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Struktur extends Migration
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
			'path_struktur' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('struktur');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('struktur');
	}
}
