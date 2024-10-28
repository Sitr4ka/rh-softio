<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Configuration extends BaseController
{
    public function config()
    {
        $user = session()->get('user');
        
        if(!$user) {
            return redirect()->back()->with('errors', "Vous n'êtes pas connecté");
        }

        $data = [
            'user'      => $user,
        ];
        return view('employee/config', $data);
    }
}
