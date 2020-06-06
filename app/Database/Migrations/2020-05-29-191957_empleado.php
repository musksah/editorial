<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Empleado extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_empleado'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'identificacion'          => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'nombre'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'apellido'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'telefono'          => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'direccion'          => [
				'type'           => 'TEXT',
				'null'           => TRUE,
			],
			'correo'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '150',
			],
			'birthdate'          => [
				'type'           => 'DATE',
				'null'           => TRUE,
			],
			'id_sucursal'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
			],
			'id_user'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
			],
			'created_at timestamp default current_timestamp',
			'updated_at timestamp default current_timestamp on update current_timestamp',
		]);
		$this->forge->addForeignKey('id_sucursal','sucursal','id_sucursal');
		$this->forge->addForeignKey('id_user','user','id');
		$this->forge->addKey('id_empleado', TRUE);
		$this->forge->createTable('empleado');
	}

	public function down()
	{
		$this->forge->dropTable('empleado');
	}
}
