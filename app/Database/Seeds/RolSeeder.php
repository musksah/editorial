<?php

namespace App\Database\Seeds;

class RolSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Administrador',
                'description' => 'Usuario que tiene permisos a todo.',
                'permission_list' => '{\'1\',\'2\',\'3\',\'4\'}',
                'is_active'    => 1,
            ],
            [
                'name' => 'Comprador',
                'description' => 'Usuario para hacer compras.',
                'permission_list' => '{\'1\',\'2\',\'3\',\'4\'}',
                'is_active'    => 1,
            ],
            [
                'name' => 'Proveedor',
                'description' => 'Usuario que pública productos.',
                'permission_list' => '{\'1\',\'2\',\'3\',\'4\'}',
                'is_active'    => 1,
            ],
        ];

        // Simple Queries
        // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)",
        //         $data
        // );

        // Using Query Builder
        foreach ($data as $register) {
            $this->db->table('rol')->insert($register);
        }
    }
}
