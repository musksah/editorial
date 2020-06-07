<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rol extends Migration
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
			'name'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'description'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '250',
			],
			'permission_list'          => [
				'type'           => 'TEXT',
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
		$this->forge->createTable('rol');
	}

	public function down()
	{
		$this->forge->dropTable('rol');
	}
}
