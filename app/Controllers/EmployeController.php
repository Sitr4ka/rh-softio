<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmployeModel;
use CodeIgniter\HTTP\ResponseInterface;

class EmployeController extends BaseController
{
    public function index()
    {
        $user = session()->get('user');

        if (!$user) {
            return redirect()->back()->with('errors', "Veuillez vous connecter");
        }

        $employee = new EmployeModel();

        $data = [
            'employees' => $employee->getAll(),
            'user'      => $user,
        ];

        return view('employee/index', $data);
    }

    public function add()
    {
        $rules = [
            'nom'               => 'required',
            'prenoms'           => 'required',
            'adresse'           => 'required',
            'contact'           => 'required|is_unique[employes.contact]',
            'email'             => 'required|is_unique[employes.email]',
            'numeroCin'         => 'required|is_unique[employes.numeroCin]',
            'dateCin'           => 'required',
            'lieuCin'           => 'required',
            'nationalite'       => 'required',
            'etatCivil'         => 'required',
            'nomUrgence'        => 'required',
            'contactUrgence'    => 'required',
            'relationUrgence'   => 'required',
        ];

        $errorsMsg = [
            'nom'          => [
                'required'  => 'Veuillez entrer votre nom',
            ],
            'prenoms'          => [
                'required'  => 'Veuillez entrer vos prénoms',
            ],
            'adresse'           => [
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
            'numeroCin'            => [
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
            'nomUrgence'       => [
                'required' => 'Veuillez entrer le nom en cas d\'urgence',
            ],
            'contactUrgence'        => [
                'required' => 'Veuillez entrer un numéro d\'urgence',
            ],
            'relationUrgence'   => [
                'required' => 'Veuillez entrer votre relation avec l\'urgence',
            ],
        ];

        $validation = $this->validate($rules, $errorsMsg);

        if (!$validation) {
            $errors = $this->validator->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        } else {
            $infoModels = new EmployeModel();
            $data = [
                'nom'               => $this->request->getPost('nom'),
                'prenoms'           => $this->request->getPost('prenoms'),
                'adresse'           => $this->request->getPost('adresse'),
                'contact'           => $this->request->getPost('contact'),
                'email'             => $this->request->getPost('email'),
                'numeroCin'         => $this->request->getPost('numeroCin'),
                'dateCin'           => $this->request->getPost('dateCin'),
                'lieuCin'           => $this->request->getPost('lieuCin'),
                'nationalite'       => $this->request->getPost('nationalite'),
                'etatCivil'         => $this->request->getPost('etatCivil'),
                'nomUrgence'        => $this->request->getPost('nomUrgence'),
                'contactUrgence'    => $this->request->getPost('contactUrgence'),
                'relationUrgence'   => $this->request->getPost('relationUrgence'),
            ];

            $infoModels->save($data);
            return redirect('employee')->with('status', 'enregistrement');
        }
    }

    public function delete($id = null)
    {
        $employee = new EmployeModel();
        $employee->delete($id);

        return redirect()->back()->with('status', 'suppression');
    }

    public function update($id = null)
    {
        $employee = new EmployeModel();
        $data = [
            'nom' => $this->request->getPost('nom'),
            'prenoms' => $this->request->getPost('prenoms'),
            'adresse' => $this->request->getPost('adresse'),
            'contact' => $this->request->getPost('contact'),
            'email' => $this->request->getPost('email'),
            'numeroCin' => $this->request->getPost('numeroCin'),
            'dateCin' => $this->request->getPost('dateCin'),
            'lieuCin' => $this->request->getPost('lieuCin'),
            'nationalite' => $this->request->getPost('nationalite'),
            'etatCivil' => $this->request->getPost('etatCivil'),
            'nomUrgence' => $this->request->getPost('nomUrgence'),
            'contactUrgence' => $this->request->getPost('contactUrgence'),
            'relationUrgence' => $this->request->getPost('relationUrgence'),
        ];

        $employee->update($id, $data);
        return redirect('employee')->with('status', 'modification');
    }
}
