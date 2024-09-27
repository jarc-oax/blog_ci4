<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'José Alberto Ruiz Cruz',
                'email' => 'jarc.93.oax@gmail.com',
                'password' => password_hash('1234', null)
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => password_hash('admin', null)
            ]
        ];

        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
}
