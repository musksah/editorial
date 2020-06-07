<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Articulo extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_articulo'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'fecha timestamp',
			'titulo'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'contenido'          => [
				'type'           => 'TEXT',
				'constraint'     => '100',
			],
			'id_numero_revista'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
			],
			'id_periodista'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
			],
			'created_at timestamp',
			'updated_at timestamp',
		]);
		$this->forge->addKey('id_articulo', TRUE);
		$this->forge->addForeignKey('id_numero_revista','numero_revista','id_numero_revista');
		$this->forge->addForeignKey('id_periodista','periodista','id_periodista');
		$this->forge->createTable('articulo');
	}

	public function down()
	{
		$this->forge->dropTable('articulo');
	}
}
