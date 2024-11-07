<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Department extends BaseController
{

    public function index() {
        $user = session()->get('user');
        
        if(!$user) {
            return redirect()->back()->with('errors', "Vous n'êtes pas connecté");
        }

        $data = [
            'user'      => $user,
        ];
        return view('department/index', $data);
    }

    public function department()
    {
        $user = session()->get('user');
        
        if(!$user) {
            return redirect()->back()->with('errors', "Vous n'êtes pas connecté");
        }

        $data = [
            'user'      => $user,
        ];
        return view('department/department', $data);
    }

    public function positionHeld()
    {
        $user = session()->get('user');
        
        if(!$user) {
            return redirect()->back()->with('errors', "Vous n'êtes pas connecté");
        }

        $data = [
            'user'      => $user,
        ];
        return view('department/positionHeld', $data);
    }
}
