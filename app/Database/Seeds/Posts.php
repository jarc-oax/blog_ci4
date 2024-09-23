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

        // Simple Queries
        $this->db->query(
            'INSERT INTO posts (post_title, post_slug, post_body) VALUES(:post_title:, :post_slug:, :post_body:)',
            $data
        );

        // Using Query Builder
        $this->db->table('posts')->insert($data);
    }
}
