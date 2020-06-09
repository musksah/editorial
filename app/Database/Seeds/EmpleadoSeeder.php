<?php

namespace App\Database\Seeds;

class EmpleadoSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'identificacion' => '123456459',
                'nombre' => 'Andrés',
                'apellido' => 'Morales',
                'direccion' => 'Cra 34 # 23 - 45',
                'telefono' => '85697452',
                'correo' => 'andres@gmail.com',
                'id_sucursal' => 1,
                'id_user' => 1,
            ],
            [
                'identificacion' => '123556789',
                'nombre' => 'Pedro',
                'apellido' => 'Hortua',
                'direccion' => 'Cra 34 # 23 - 45',
                'telefono' => '88527452',
                'correo' => 'pedro1@gmail.com',
                'id_sucursal' => 11,
                'id_user' => 2,
            ],
            [
                'identificacion' => '123477789',
                'nombre' => 'Michael',
                'apellido' => 'Rendón',
                'direccion' => 'Cra 34 # 23 - 45',
                'telefono' => '85685212',
                'correo' => 'michael@gmail.com',
                'id_sucursal' => 21,
                'id_user' => 3,
            ],
        ];
        // Using Query Builder
        foreach ($data as $register) {
            $this->db->table('empleado')->insert($register);
        }
    }
}
