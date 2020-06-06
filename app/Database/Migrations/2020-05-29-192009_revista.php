<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Revista extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_revista'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'titulo'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '150',
			],
			'numero_registro'          => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'tipo'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '150',
			],
			'periodicidad'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'id_sucursal'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
			],
			'created_at timestamp default current_timestamp',
			'updated_at timestamp default current_timestamp on update current_timestamp',
		]);
		$this->forge->addForeignKey('id_sucursal','sucursal','id_sucursal');
		$this->forge->addKey('id_revista', TRUE);
		$this->forge->createTable('revista');
	}

	public function down()
	{
		$this->forge->dropTable('revista');
	}
}
