<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserPermission extends Migration
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
			'id_permission'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
			],
			'id_user'          => [
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
		$this->forge->addForeignKey('id_permission','permission','id');
		$this->forge->addForeignKey('id_user','user','id');
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('user_permission');
	}

	public function down()
	{
		$this->forge->dropTable('user_permission');
	}
}
