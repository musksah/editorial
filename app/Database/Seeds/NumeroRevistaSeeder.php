<?php

namespace App\Database\Seeds;

class NumeroRevistaSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'id_numero_revista' => 1,
                'fecha' => date('Y-m-d H:i:s'),
                'numero_paginas' => 50,
                'ejemplares_vendidos' => 2,
                'id_revista' => 1,
            ],
            [
                'id_numero_revista' => 11,
                'fecha' => date('Y-m-d H:i:s'),
                'numero_paginas' => 60,
                'ejemplares_vendidos' => 3,
                'id_revista' => 11,
            ],
            [
                'id_numero_revista' => 31,
                'fecha' => date('Y-m-d H:i:s'),
                'numero_paginas' => 50,
                'ejemplares_vendidos' => 5,
                'id_revista' => 31,
            ],
        ];
        // Using Query Builder
        foreach ($data as $register) {
            $this->db->table('numero_revista')->insert($register);
        }
    }
}
