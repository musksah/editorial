<?php

namespace App\Database\Seeds;

class RolSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Admin',
                'description' => 'Usuario que tiene permisos a todo.',
                'permission_list' => '{\'1\',\'2\',\'3\',\'4\'}',
                'is_active'    => 1,
            ],
            [
                'name' => 'User1',
                'description' => 'Usuario para hacer compras.',
                'permission_list' => '{\'1\',\'2\',\'3\',\'4\'}',
                'is_active'    => 1,
            ],
            [
                'name' => 'User2',
                'description' => 'Usuario que pública productos.',
                'permission_list' => '{\'1\',\'2\',\'3\',\'4\'}',
                'is_active'    => 1,
            ],
        ];

        // Using Query Builder
        foreach ($data as $register) {
            $this->db->table('rol')->insert($register);
        }
    }
}
