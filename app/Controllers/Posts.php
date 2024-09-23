<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Posts as PostsModel;

class Posts extends BaseController
{
    /**
     * Root page
     * 
     * @return string
     */
    public function index(): string
    {
        $model = model(PostsModel::class);

        $data['title'] = 'Blog';
        $data['posts'] = $model->getPosts();

        return view('templates/header', $data) .
            view('posts/index') .
            view('templates/footer');
    }

    /**
     * Create new post form
     *
     * @return string
     */
    public function new(): string
    {
        helper('form');
        $data['title'] = 'Create a new post';

        return view('templates/header', $data) .
            view('posts/create') .
            view('templates/footer');
    }

    /**
     * Create new post
     *
     * @return string
     */
    public function create(): string
    {
        helper('form');

        $data = $this->request->getPost(['post_title', 'post_body']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($data, [
            'post_title' => 'required|max_length[255]|min_length[3]',
            'post_body'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            // The validation fails, so returns the form.
            return $this->new();
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model = model(PostsModel::class);

        $model->save([
            'post_title' => $post['post_title'],
            'post_slug'  => url_title($post['post_title'], '-', true),
            'post_body'  => $post['post_body'],
        ]);

        return $this->index();
    }
}
