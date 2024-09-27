<?php
namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class SessionController extends BaseController
{
    public function authorised($data)
    {
        $this->session = \Config\Services::session();

        $authData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'isLoggedIn' => true
        ];

        $this->session->set($authData);
    }

    public function unauthorised()
    {
        $this->session = \Config\Services::session();
        $this->session->destroy();
    }
}