<?php

namespace App\Database\Seeds;

class ItemCategorySeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        for ($i = 2; $i < 74; $i++) {
            # code...
            $data[] = [
                'id_category' => rand(1, 3),
                'id_item' => $i,
                'is_active'    => 1,
            ];
        }

        // $data = [
        //     [
        //         'name' => 'Mouse Logitech',
        //         'description' => 'Último mouse de logitech',
        //         'serial_number' => 'ASX1552',
        //         'price' => 80000,
        //         'id_image'    => 1,
        //         'id_provider'    => 1,
        //         'is_active'    => 1,
        //     ],
        //     [
        //         'name' => 'Teclado Logitech',
        //         'description' => 'Último mouse de logitech',
        //         'serial_number' => 'ASR5246',
        //         'price' => 70000,
        //         'id_image'    => 1,
        //         'id_provider'    => 1,
        //         'is_active'    => 1,
        //     ],
        // ];

        // Simple Queries
        // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)",
        //         $data
        // );

        // Using Query Builder
        foreach ($data as $register) {
            $this->db->table('item_category')->insert($register);
        }
    }
}
