<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Visimisi extends Migration
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
			'visi' => [
				'type' => 'TEXT',
			],
			'misi' => [
				'type' => 'TEXT',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('visimisi');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('visimisi');
	}
}
