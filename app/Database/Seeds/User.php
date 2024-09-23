<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'José Alberto Ruiz Cruz',
            'email' => 'jarc.93.oax@gmail.com',
            'password' => password_hash('1234', null)
        ];

        // Simple Queries
        $this->db->query(
            'INSERT INTO users (name, email, password) VALUES(:name:, :email:, :password:)',
            $data
        );

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
