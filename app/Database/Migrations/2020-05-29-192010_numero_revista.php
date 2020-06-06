<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NumeroRevista extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_numero_revista'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'fecha timestamp default current_timestamp',
			'numero_paginas'          => [
				'type'           => 'INT',
				'constraint'     => 5,
			],
			'ejemplares_vendidos'          => [
				'type'           => 'INT',
				'constraint'     => 10,
			],
			'id_revista'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
			],
			'created_at timestamp default current_timestamp',
			'updated_at timestamp default current_timestamp on update current_timestamp',
		]);
		$this->forge->addForeignKey('id_revista','revista','id_revista');
		$this->forge->addKey('id_numero_revista', TRUE);
		$this->forge->createTable('numero_revista');
	}

	public function down()
	{
		$this->forge->dropTable('numero_revista');
	}
}
