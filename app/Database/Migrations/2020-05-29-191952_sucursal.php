<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sucursal extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_sucursal'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'nombre'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '150',
			],
			'telefono'          => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'direccion'          => [
				'type'           => 'TEXT',
			],
			'codigo_sucursal'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '150',
			],
			'created_at timestamp default current_timestamp',
			'updated_at timestamp default current_timestamp on update current_timestamp',
		]);
		$this->forge->addKey('id_sucursal', TRUE);
		$this->forge->createTable('sucursal');
	}

	public function down()
	{
		$this->forge->dropTable('sucursal');
	}
}
