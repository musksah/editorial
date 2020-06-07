<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Permission extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'codename'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'is_active'          => [
				'type'           => 'TINYINT',
			],
			'created_at timestamp',
			'updated_at timestamp',
			'last_update_user'       => [
				'type'           => 'INT',
				'null'           => TRUE,
			],
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('permission');
	}

	public function down()
	{
		$this->forge->dropTable('permission');
	}
}
