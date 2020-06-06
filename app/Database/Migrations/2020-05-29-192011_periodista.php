<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Periodista extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_periodista'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'nombre'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '150',
			],
			'apellido'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '150',
			],
			'correo'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '250',
			],
			'telefono'          => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'identificacion'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
			],
			'especialidad'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '150',
			],
			'created_at timestamp default current_timestamp',
			'updated_at timestamp default current_timestamp on update current_timestamp',
		]);
		$this->forge->addKey('id_periodista', TRUE);
		$this->forge->createTable('periodista');
	}

	public function down()
	{
		$this->forge->dropTable('periodista');
	}
}
