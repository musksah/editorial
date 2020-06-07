<?php

namespace App\Database\Seeds;

class PeriodistaSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'nombre' => 'Catherine',
                'apellido' => 'Mora',
                'telefono' => '85697452',
                'correo' => 'cat@gmail.com',
                'especialidad' => 'Ciencia',
                'identificacion' => '895632541',
            ],
            [
                'nombre' => 'Carolina',
                'apellido' => 'Camelo',
                'telefono' => '88527452',
                'correo' => 'caro1@gmail.com',
                'especialidad' => 'Política',
                'identificacion' => '895632541',
            ],
            [
                'nombre' => 'Dayana',
                'apellido' => 'Rico',
                'telefono' => '85685212',
                'correo' => 'day@gmail.com',
                'especialidad' => 'Deportes',
                'identificacion' => '895632541',
            ],
        ];
        // Using Query Builder
        foreach ($data as $register) {
            $this->db->table('periodista')->insert($register);
        }
    }
}
