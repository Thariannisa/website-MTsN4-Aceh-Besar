<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tatatertib extends Migration
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
			'tatatertib' => [
				'type' => 'TEXT',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('tatatertib');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tatatertib');
	}
}
