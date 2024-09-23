<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Blog extends BaseController
{
    
    public function index(): string
    {
        $data['title'] = 'Blog';

        return view('templates/header', $data) .
            view('blog/index') .
            view('templates/footer');
    }
}
