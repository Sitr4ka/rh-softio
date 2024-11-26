<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmployeModel;
use App\Models\PointageModel;

class Scoring extends BaseController
{
    public function index()
    {
        $user = session()->get('user');

        if (!$user) {
            return redirect()->back()->with('errors', "Vous n'êtes pas connecté");
        }

        $today = date('Y-m-d');

        $day = getFrenchDayName(date('l'));

        $employeeLists = new EmployeModel();
        $employeeLists = $employeeLists->getEmployeesByDay($day);
        foreach ($employeeLists as &$employeeList) {
            $idEmploye = $employeeList['idEmploye'];
            $pointages = new PointageModel();
            $pointage = $pointages->getScoringById($idEmploye);
            if ($pointage) {
                $employeeList['heureEntree'] = $pointage['heureEntree'];
                $employeeList['heureSortie'] = $pointage['heureSortie'];
            }
        }

        $data = [
            'user'      => $user,
            'today'     => $today,
            'employees' => $employeeLists
        ];

        return view('scoring/scoring', $data);
    }

    public function addScoring()
    {
        $idEmploye = $this->request->getPost('numEmploye');
        $date = $this->request->getPost('datePointage');
        $observation = 'A';
        $heureEntree = $this->request->getPost('heureEntree');

        if ($heureEntree) {
            $observation = 'P';
        }

        //Verify if there is already a record for this employe
        $pointages = new PointageModel();
        $pointage = $pointages
            ->where('date', $date)
            ->where("idEmploye", $idEmploye)
            ->first();

        $data = [
            'date' => $date,
            'heureEntree' => $heureEntree,
            'heureSortie' => $this->request->getPost('heureSortie'),
            'observation' => $observation,
            'idEmploye' => $idEmploye
        ];

        //Update appointment if record found
        if ($pointage) {
            $idPointage = $pointage['idPointage'];
            $pointages->update($idPointage, $data);
        } else {
            $pointages->save($data);
        }






        return redirect('home/scoring')->with('status', 'enregistrement');
    }
}
