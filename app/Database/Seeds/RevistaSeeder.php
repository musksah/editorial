<?php

namespace App\Database\Seeds;

class RevistaSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'titulo' => 'Programas TV',
                'numero_registro' => 1001,
                'tipo' => 'Entretenimiento',
                'periodicidad' => 'Mensual',
                'id_sucursal' => 1,
            ],
            [
                'titulo' => 'Aprende Programación',
                'numero_registro' => 1002,
                'tipo' => 'Educación',
                'periodicidad' => 'Mensual',
                'id_sucursal' => 1,
            ],
            [
                'titulo' => 'La ciudad',
                'numero_registro' => 1003,
                'tipo' => 'Informativa',
                'periodicidad' => 'Mensual',
                'id_sucursal' => 2,
            ],
        ];
        // Using Query Builder
        foreach ($data as $register) {
            $this->db->table('revista')->insert($register);
        }
    }
}
