<?php

namespace App\Database\Seeds;

class SucursalSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'telefono' => '123456789',
                'nombre' => 'Chapinero',
                'direccion' => 'Cra 26 # 15 - 32',
                'codigo_sucursal' => 'SC01',
            ],
            [
                'telefono' => '14563557',
                'nombre' => 'Fontibón',
                'direccion' => 'Cra 100 # 55 - 32',
                'codigo_sucursal' => 'SC02',
            ],
            [
                'telefono' => '8987455',
                'nombre' => 'Norte',
                'direccion' => 'Cra 126 # 115 - 32',
                'codigo_sucursal' => 'SC03',
            ],
        ];
        // Using Query Builder
        foreach ($data as $register) {
            $this->db->table('sucursal')->insert($register);
        }
    }
}
