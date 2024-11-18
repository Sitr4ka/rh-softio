<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login(): string
    {
        session()->destroy();
        return view('auth/login');
    }

    public function auth()
    {
        $data = $this->request->getPost();

        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        $validation = $this->validate($rules);

        if (!$validation) {

            $errors = $this->validator->getErrors();
            return redirect()->back()->with('validation_errors', $errors);

        } else {
            
            $users = new UserModel();
            $user = $users->where('username', $data['username'])->first();

            if (!$user) {
                return redirect()->back()->with('errors', 'Utilisateur non trouvé');
            } else {
                $password_check = password_verify($data['password'], $user->password);

                if (!$password_check) {
                    return redirect()->back()->with('errors', 'Mot de passe incorrect');
                } else {
                    session()->set('user', [
                        'id' => $user->id,
                        'username' => $user->username,
                        'email' => $user->email
                    ]);
                    
                    return redirect('employee');
                }
            }
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registration()
    {
        $rules = [
            'username' => 'required|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[5]|max_length[12]',
        ];

        $validation = $this->validate($rules);

        if (!$validation) {
            $errors = $this->validator->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        } else {
            $user = new UserModel();

            $password = $this->request->getPost('password');
            $data = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => Hash::make($password),
            ];

            $user->save($data);
            return redirect('auth/login')->with('status', 'Utilisateur enregistré avec success');
        }
    }
}