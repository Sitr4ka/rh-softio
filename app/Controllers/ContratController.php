<?php

namespace App\Controllers;

use App\Models\ContratModel;

use App\Controllers\BaseController;

class ContratController extends BaseController
{
    public function index()
    {
        $user = session()->get('user');

        if (!$user) {
            return redirect()->back()->with('status', "Vous n'êtes pas connecté");
        }

        $contrat = new ContratModel();
        $data = [
            'contrats' => $contrat->getAll(),
            'user'      => $user,
        ];

        return view('employee/contrat', $data);
    }
}
