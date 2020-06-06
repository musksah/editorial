<?php

namespace App\Database\Seeds;

class ProviderSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'nit' => 789456123,
                'name' => 'Logitech',
                'email' => 'info@logitech.com',
                'id_user'    => 2,
                'is_active'    => 1,
            ],
        ];

        // Simple Queries
        // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)",
        //         $data
        // );

        // Using Query Builder
        foreach ($data as $register) {
            $this->db->table('provider')->insert($register);
        }
    }
}
