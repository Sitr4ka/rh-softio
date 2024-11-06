<?php

namespace App\Controllers;

use App\Models\InfoPersoModel;
use App\Models\InfoProModel;
use App\Controllers\BaseController;
class InfoPro extends BaseController
{
    public function index()
    {
        $user = session()->get('user');

        if (!$user) {
            return redirect()->back()->with('status', "Vous n'êtes pas connecté");
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
            return redirect('employee/infopro/index')->with('status', 'enregistrement');
        } else {

            return redirect('employee/infopro/index')->with('status', 'erreur');
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
        return redirect('employee/infopro/index')->with('status', 'modification');
    }

    public function delete($id = null)
    {
        $model = new InfoProModel();
        $model->delete($id);

        return redirect()->back()->with('status', 'suppression');
    }
}
