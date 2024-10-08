<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InfoPersoModel;
use CodeIgniter\HTTP\ResponseInterface;

class Employee extends BaseController
{
    public function index(): string
    {
        $model = new InfoPersoModel();
        $data['employees'] = $model->getAll();
        return view('employee/index', $data);
    }

    public function add()
    {
        $infoModels = new InfoPersoModel();
        $data = [
            'nom' => $this->request->getPost('lastName'),
            'prenom' => $this->request->getPost('firstName'),
            'adresse' => $this->request->getPost('address'),
            'contact' => $this->request->getPost('contact'),
            'mail' => $this->request->getPost('email'),
            'numeroCin' => $this->request->getPost('numCin'),
            'dateCin' => $this->request->getPost('dateCin'),
            'lieuCin' => $this->request->getPost('lieuCin'),
            'nationalité' => $this->request->getPost('nationalite'),
            'etatCivil' => $this->request->getPost('etatCivil'),
            'nomUrgence' => $this->request->getPost('urgenceName'),
            'contactUrgence' => $this->request->getPost('urgenceNum'),
            'relation' => $this->request->getPost('urgenceRelation'),
        ];

        $infoModels->save($data);

        return redirect('employee/index')->with('status', 'Enregistrement réussi');
    }
}
