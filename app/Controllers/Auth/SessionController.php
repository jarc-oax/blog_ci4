<?php
namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class SessionController extends BaseController
{
    public function authorised($data)
    {
        $session = session();
        $authData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'isLoggedIn' => true
        ];

        $session->set($authData);
    }

    public function unauthorised()
    {
        $session = session();
        $authData = ['isLoggedIn' => false];

        $session->set($authData);
    }
}