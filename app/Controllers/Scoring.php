<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Scoring extends BaseController
{
    public function index()
    {
        $user = session()->get('user');
        
        if(!$user) {
            return redirect()->back()->with('errors', "Vous n'êtes pas connecté");
        }

        $data = [
            'user'      => $user,
        ];
        return view('scoring/index', $data);
    }
}
