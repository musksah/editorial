<?php

namespace App\Database\Seeds;

class ImageSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'mouse_logic.jpg',
                'url' => 'img/mouses/mouse_logic.jpg',
                'type_image' => 'jpg',
                'is_active'    => 1,
            ],
            [
                'name' => 'mouse_logic.jpg',
                'url' => 'img/mouses/mouse_logic.jpg',
                'type_image' => 'jpg',
                'is_active'    => 1,
            ],
            [
                'name' => 'mouse_logic.jpg',
                'url' => 'img/mouses/mouse_logic.jpg',
                'type_image' => 'jpg',
                'is_active'    => 1,
            ],
        ];

        // Simple Queries
        // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)",
        //         $data
        // );

        // Using Query Builder
        foreach ($data as $register) {
            $this->db->table('image')->insert($register);
        }
    }
}
