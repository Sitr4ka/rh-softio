<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function __construct() {
        helper(['url', 'form']);
    }

    public function login(): string
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registration() {
        
        $validation = $this->validate([
            'username' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[5]|max_length[12]',
        ]);

        if(!$validation) {
            return view('auth/register', ['validation' => $this->validator]);
        } else {
            echo 'form validated successfully';
        }
    }

    
}
