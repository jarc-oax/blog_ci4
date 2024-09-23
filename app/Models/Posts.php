<?php

namespace App\Models;

use CodeIgniter\Model;

class Posts extends Model
{
    protected $table            = 'posts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['post_title', 'post_slug', 'post_body'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];



    /**
     * Method to get posts
     * 
     * @param false|string $slug
     *
     * @return array|null
     */
    public function getPosts($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['post_slug' => $slug])->first();
    }

    /**
     * Method to get posts
     * 
     * @param false|string $slug
     *
     * @return array|null
     */
    public function getPostById($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where(['post_id' => $id])->first();
    }

    /**
     * Method to delete a post
     *
     * @param int
     *
     * @return bool
     */
    public function deletePost($post_id)
    {
        $result = $this->db->table('posts')->where('post_id', $post_id)->delete();
        
        return ($this->db->affectedRows()) ? true : false;
    }

    /**
     * Method to update a post
     * 
     * @param array
     * 
     * @return bool
     */
    public function updatePost($post)
    {
        $builder = $this->db->table('posts');
        $builder->set('post_title', $post['post_title']);
        $builder->set('post_body', $post['post_body']);
        $builder->where('post_pid', $post['post_id']);
        $builder->update();
    }
}
