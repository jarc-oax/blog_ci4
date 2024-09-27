<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Posts extends Seeder
{
    public function run()
    {
        $data = [
            'post_title' => 'Post One',
            'post_slug' => 'one',
            'post_body' => 'First post'
        ];
        
        $this->db->table('posts')->insert($data);
    }
}
