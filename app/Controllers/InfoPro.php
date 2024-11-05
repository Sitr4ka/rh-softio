<?php

namespace App\Controllers;

use App\Models\InfoPersoModel;
use App\Models\InfoProModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use PHPUnit\Event\Telemetry\Info;

class InfoPro extends BaseController
{
    public function index()
    {
        $user = session()->get('user');

        if (!$user) {
            return redirect()->back()->with('errors', "Vous n'êtes pas connecté");
        }

        $infoPro = new InfoProModel();
        $data = [
            'infoPros' => $infoPro->getAll(),
            'user'      => $user,
        ];



        return view('employee/infoPro', $data);
    }

    public function add()
    {
        $email = $this->request->getPost('email');
        $employees = new InfoPersoModel();
        $employee = $employees->where('mail', $email)->first();

        if ($employee) {
            $employeeId = $employee['idInfoPerso'];

            $infoPro = new InfoProModel();
            $data = [
                'idInfoPerso' => $employeeId,
                'contractType' => $this->request->getPost('contractType'),
                'classification' => $this->request->getPost('classification'),
                'hireDate' => $this->request->getPost('hireDate'),
                'contractEndDate' => $this->request->getPost('contractEndDate'),
                'department' => $this->request->getPost('department'),
                'workLocation' => $this->request->getPost('workLocation'),
                'positionHeld' => $this->request->getPost('positionHeld'),
                'workingHours' => $this->request->getPost('workingHours')
            ];

            $infoPro->save($data);
            return redirect('/')->with('status', 'Enregistrement des informations professionnelles réussi');
        } else {

            return redirect('/')->with('status', 'Employé non trouvé');
        }
    }

    public function update($employeeNumber = null)
    {
        $employees = new InfoProModel();
        $employee = $employees->where('idInfoPro', $employeeNumber)->first();
        $id = $employee['idInfoPro'];
        $data = [
            'contractType' => $this->request->getPost('contractType'),
            'classification' => $this->request->getPost('classification'),
            'hireDate' => $this->request->getPost('hireDate'),
            'contractEndDate' => $this->request->getPost('contractEndDate'),
            'status' => $this->request->getPost('status'),
            'department' => $this->request->getPost('department'),
            'workLocation' => $this->request->getPost('workLocation'),
            'positionHeld' => $this->request->getPost('positionHeld'),
            'workingHours' => $this->request->getPost('workingHours')
        ];


        $employees->update($id, $data);
        return redirect('/')->with('status', 'Modification réussi');
    }

    public function delete($id = null)
    {
        $model = new InfoProModel();
        $model->delete($id);

        return redirect()->back()->with('status', 'Suppression réussi');
    }
}
