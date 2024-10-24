<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InfoPersoModel;
use App\Models\InfoProModel;
use CodeIgniter\HTTP\ResponseInterface;

class Employee extends BaseController
{

    public function index()
    {
        $user = session()->get('user');
        
        if(!$user) {
            return redirect()->back()->with('errors', "Vous n'êtes pas connecté");
        }

        $employee = new InfoPersoModel();
        $infoPro = new InfoProModel();

        $data = [
            'employees' => $employee->getAll(),
            'infoPros'  => $infoPro->getAll(),
            'user'      => $user,
        ];

        return view('employee/index', $data);
    }

    public function add()
    {
        $infoModels = new InfoPersoModel();
        $email = $this->request->getPost('email');
        
        if ($this->checkEmail($email))
        {
            return redirect('home')->with('error', 'Cet email est déjà utilisé');
        } else {
            $data = [
                'nom' => $this->request->getPost('lastName'),
                'prenom' => $this->request->getPost('firstName'),
                'adresse' => $this->request->getPost('address'),
                'contact' => $this->request->getPost('contact'),
                'mail' => $email,
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
    
            return redirect('home')->with('status', 'Enregistrement réussi');
            
        }
        
    }

    public function delete($id = null) {
        $model = new InfoPersoModel();
        $model->delete($id);

        return redirect()->back()->with('status', 'Suppression réussi');
    }
    

    public function update($id = null) {
        $model = new InfoPersoModel();
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

        $model->update($id, $data);
        return redirect('home')->with('status', 'Modification réussi');
    }
    
    function checkEmail($email) {
        $employees = new InfoPersoModel();
        return $employees->where('mail', $email)->first() !== NULL;
    }

}
