<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
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
			'username'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'name'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '150',
				'null'           => TRUE,
			],
			'email'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'password'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '250',
			],
			'id_rol'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
			],
			'is_active'          => [
				'type'           => 'TINYINT',
			],
			'created_at timestamp default current_timestamp',
			'updated_at timestamp default current_timestamp on update current_timestamp',
			'last_update_user'       => [
				'type'           => 'INT',
				'null'           => TRUE,
			],
		]);
		$this->forge->addForeignKey('id_rol','rol','id');
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('user');
	}

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
