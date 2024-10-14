<?php

namespace App\Controllers;

use App\Models\InfoPersoModel;
use App\Models\InfoProModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use PHPUnit\Event\Telemetry\Info;

class InfoPro extends BaseController
{
    public function add()
    {
        $email = $this->request->getPost('email');
        $employees = new InfoPersoModel();
        $employee = $employees->where('mail', $email)->first();

        if($employee)
        {
            $employeeId = $employee['idInfoPerso'];

            $infoPro = new InfoProModel();
            $data = [
                'idInfoPerso' => $employeeId,
                'employeeNumber'=> $this->request->getPost('employeeNumber'),
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

            $infoPro->save($data);
            return redirect('employee/index')->with('status', 'Enregistrement des informations professionnelles réussi');

        } else {

            return redirect('employee/index')->with('status', 'Employé non trouvé');

        }
    }
}
