<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InfoPersoModel;
use App\Models\InfoProModel;
use CodeIgniter\HTTP\ResponseInterface;

class InfoPerso extends BaseController
{

    public function index()
    {
        $user = session()->get('user');

        if (!$user) {
            return redirect()->back()->with('errors', "Veuillez vous connecter");
        }

        $employee = new InfoPersoModel();

        $data = [
            'employees' => $employee->getAll(),
            'user'      => $user,
        ];


        return view('employee/infoPerso', $data);
    }

    public function add()
    {
        $rules = [
            'lastName'          => 'required',
            'address'           => 'required',
            'contact'           => 'required|is_unique[InfoPersos.contact]',
            'email'             => 'required|is_unique[InfoPersos.mail]',
            'numCin'            => 'required|is_unique[InfoPersos.numeroCin]',
            'dateCin'           => 'required',
            'lieuCin'           => 'required',
            'nationalite'       => 'required',
            'etatCivil'         => 'required',
            'urgenceName'       => 'required',
            'urgenceNum'        => 'required',
            'urgenceRelation'   => 'required',
        ];

        $errorsMsg = [
            'lastName'          => [
                'required'  => 'Veuillez entrer votre nom',
            ],
            'address'           => [
                'required'  => 'Veuillez entrer votre adresse',
            ],
            'contact'           => [
                'required' => 'Veuillez entrer votre numéro téléphone',
                'is_unique' => 'Ce numéro téléphone est déjà utilisé',
            ],
            'email'             => [
                'required' => 'Veuillez entrer votre adresse email',
                'is_unique' => 'Cet adresse email est déjà utilisé',
            ],
            'numCin'            => [
                'required' => 'Veuillez entrer votre numéro CIN',
                'is_unique' => 'Ce numéro CIN est déjà utilisé',
            ],
            'dateCin'           => [
                'required' => 'Veuillez entrer la date de délivrance de votre CIN',
            ],
            'lieuCin'           => [
                'required' => 'Veuillez saisir le lieu de délivrance de votre CIN',
            ],
            'nationalite'       => [
                'required' => 'Veuillez entrer votre nationalité',
            ],
            'etatCivil'         => [
                'required' => 'Veuillez sélectionner votre Etat Civil',
            ],
            'urgenceName'       => [
                'required' => 'Veuillez entrer le nom en cas d\'urgence',
            ],
            'urgenceNum'        => [
                'required' => 'Veuillez entrer un numéro d\'urgence',
            ],
            'urgenceRelation'   => [
                'required' => 'Veuillez entrer votre relation avec l\'urgence',
            ],
        ];

        $validation = $this->validate($rules, $errorsMsg);

        if (!$validation) {
            $errors = $this->validator->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        } else {
            $infoModels = new InfoPersoModel();
            $data = [
                'nom'               => $this->request->getPost('lastName'),
                'prenom'            => $this->request->getPost('firstName'),
                'adresse'           => $this->request->getPost('address'),
                'contact'           => $this->request->getPost('contact'),
                'mail'              => $this->request->getPost('email'),
                'numeroCin'         => $this->request->getPost('numCin'),
                'dateCin'           => $this->request->getPost('dateCin'),
                'lieuCin'           => $this->request->getPost('lieuCin'),
                'nationalité'       => $this->request->getPost('nationalite'),
                'etatCivil'         => $this->request->getPost('etatCivil'),
                'nomUrgence'        => $this->request->getPost('urgenceName'),
                'contactUrgence'    => $this->request->getPost('urgenceNum'),
                'relation'          => $this->request->getPost('urgenceRelation'),
            ];

            $infoModels->save($data);
            return redirect('home')->with('status', 'enregistrement');
        }
    }

    public function delete($id = null)
    {
        $model = new InfoPersoModel();
        $model->delete($id);

        return redirect()->back()->with('status', 'suppression');
    }


    public function update($id = null)
    {
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
        return redirect('home')->with('status', 'modification');
    }

    function checkEmail($email)
    {
        $employees = new InfoPersoModel();
        return $employees->where('mail', $email)->first() !== NULL;
    }
}
