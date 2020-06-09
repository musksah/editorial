<?php

namespace App\Database\Seeds;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'id'=>1,
                'username' => 'admin',
                'name' => 'Sebastián Huérfano',
                'password' => password_hash("12345", PASSWORD_DEFAULT),
                'email' => 'sebastian@trenditem.com',
                'id_rol'    => 1,
                'is_active'    => 1,
            ],
            [
                'id'=>2,
                'username' => 'pedrologi',
                'name' => 'Pedro Jesús',
                'password' => password_hash("12345", PASSWORD_DEFAULT),
                'email' => 'pedro@logitech.com',
                'id_rol'    => 1,
                'is_active'    => 1,
            ],
            [
                'id'=>3,
                'username' => 'pedro123',
                'name' => 'Pablo Martinez',
                'password' => password_hash("12345", PASSWORD_DEFAULT),
                'email' => 'pablo123@gmail.com',
                'id_rol'    => 1,
                'is_active'    => 1,
            ],
        ];

        // Simple Queries
        // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)",
        //         $data
        // );

        // Using Query Builder
        foreach ($data as $register) {
            $this->db->table('user')->insert($register);
        }
    }
}
