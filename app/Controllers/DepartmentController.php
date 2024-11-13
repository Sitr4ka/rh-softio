<?php

namespace App\Controllers;

use App\Models\DepartementModel;
use App\Models\PosteModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use PhpParser\Node\Expr\PostDec;

class DepartmentController extends BaseController
{

    public function index()
    {
        $user = session()->get('user');

        if (!$user) {
            return redirect()->back()->with('errors', "Vous n'êtes pas connecté");
        }

        $departements = new DepartementModel();
        $postes = new PosteModel();

        $data = [
            'departements'  => $departements
                ->orderBy('idDepart', 'ASC')
                ->getAll(),
            'postes'        => $postes->getAll(),
            'user'          => $user,
        ];
        return view('department/index', $data);
    }

    public function addDepartment()
    {
        $departements = new DepartementModel();
        $data = [
            'libelleDepart' => $this->request->getPost('libelleDepart'),
        ];

        $departements->save($data);

        return redirect('department')->with('status', 'enregistrement');
    }

    public function updateDepartment($id = null)
    {
        $departement = new DepartementModel();
        $data = [
            'libelleDepart' => $this->request->getPost('libelleDepart'),
        ];

        $departement->update($id, $data);
        return redirect('department')->with('status', 'modification');
    }

    public function deleteDepartment($id = null)
    {
        $departements = new DepartementModel();
        $departements->delete($id);

        return redirect()->back()->with('status', 'suppression');
    }

    public function addPositionHeld()
    {
        $postes = new PosteModel();
        $departements = new DepartementModel();


        $libelleDepart = $this->request->getPost('departement');
        $departement = $departements->where('libelleDepart', $libelleDepart)->first();
        $idDepart = $departement['idDepart'];

        $data = [
            'poste' => $this->request->getPost('poste'),
            'idDepart' => $idDepart
        ];

        $postes->save($data);
        return redirect('department')->with('status', 'enregistrement');
    }

    public function updatePostionHeld($id = null)
    {
        $postes = new PosteModel();
        $poste = $postes->where('idPoste', $id)->first();

        $departements = new DepartementModel();


        $libelleDepart = $this->request->getPost('departement');
        $departement = $departements->where('libelleDepart', $libelleDepart)->first();

        $idDepart = $departement['idDepart'];

        $data = [
            'poste' => $this->request->getPost('poste'),
            'idDepart' => $idDepart
        ];

        $postes->update($id, $data);
        return redirect('department')->with('status', 'modification');
    }

    public function deletePositionHeld($id = null)
    {
        $postes = new PosteModel();
        $postes->delete($id);

        return redirect()->back()->with('status', 'suppression');
    }
}
