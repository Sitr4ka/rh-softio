<?php

namespace App\Controllers;

use App\Models\DepartementModel;
use App\Models\PosteModel;

use App\Controllers\BaseController;
use App\Models\ContratModel;
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
        
        $searchInput = $this->request->getGet('searchDepart');
        
        if ($searchInput) {
            $postes->like('poste', $searchInput);
        }
        
        $data = [
            'departements'  => $departements->getAll(),
            'postes'        => $postes->getAll(),
            'pager'         => $postes->pager,
            'search'        => $searchInput,
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

    public function deleteDepartment($idDepart = null)
    {
        $departements = new DepartementModel();
        $departements->deleteDepartById($idDepart);

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

    public function updatePostionHeld($idPoste = null)
    {
        $libelleDepart = $this->request->getPost('departement');

        $departements = new DepartementModel();
        $departement = $departements->where('libelleDepart', $libelleDepart)->first();
        $idDepart = $departement['idDepart'];

        $data = [
            'poste' => $this->request->getPost('poste'),
            'idDepart' => $idDepart
        ];
        
        $postes = new PosteModel();
        $postes->update($idPoste, $data);
        return redirect('department')->with('status', 'modification');
    }

    public function deletePositionHeld($idPoste = null)
    {
        $postes = new PosteModel();
        $postes->deletePosteById($idPoste);

        return redirect()->back()->with('status', 'suppression');
    }
}
