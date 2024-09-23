<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Posts as PostsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

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
     * Show the post
     *
     * @return string
     */
    public function show(?string $slug = null)
    {
        $model = model(PostsModel::class);

        $data['post'] = $model->getPosts($slug);

        if ($data['post'] === null) {
            throw new PageNotFoundException('Cannot find the post item: ' . $slug);
        }

        $data['title'] = $data['post']['post_title'];

        return view('templates/header', $data)
            . view('posts/view')
            . view('templates/footer');
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

    /**
     * Edit form
     * 
     * @return string
     */
    public function edit($post_id): string
    {
        helper('form');
        $model = model(PostsModel::class);
        $data['post'] = $model->getPostById($post_id);
        $data['title'] = 'Edit post '. $data['post']['post_title'];

        return view('templates/header', $data) .
            view('posts/edit', $data) .
            view('templates/footer');
    }

    /**
     * Update post form
     *
     * @return string
     */
    public function update(): string
    {
        $data = $this->request->getPost(['post_id', 'post_title', 'post_body']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($data, [
            'post_title' => 'required|max_length[255]|min_length[3]',
            'post_body'  => 'required|max_length[5000]|min_length[10]',
        ])) {
        // The validation fails, so returns the form.
            return $this->edit($data['post_id']);
        }
        $model = model(PostsModel::class);
        $model->updatePost($data);

        return $this->index();
    }

    /**
     * Update post method
     *
     * @return string
     */
    public function delete($post_id): string
    {

        $model = model(PostsModel::class);
        $model->deletePost($post_id);

        return $this->index();
    }
}
