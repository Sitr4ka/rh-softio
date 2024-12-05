<?php

namespace App\Controllers;

use App\Models\ContratModel;
use App\Models\EmployeModel;
use App\Models\HoraireModel;
use App\Models\PosteModel;

use App\Controllers\BaseController;

class ContratController extends BaseController
{
    public function index()
    {
        $user = session()->get('user');
        $currentDate = date('Y-m-d');
        if (!$user) {
            return redirect()->back()->with('status', "Vous n'êtes pas connecté");
        }

        $postes = new PosteModel();
        $postes = $postes->getAll();

        $contrats = new ContratModel();
        
        $data = [
            'user'      => $user,
            'currentDate' => $currentDate,
            'contrats' => $contrats->getWithPositionHired(),
            'pager'     => $contrats->pager,
            'postes' => $postes,
        ];

        return view('employee/contrat', $data);
    }

    public function newContrat()
    {
        //check if employee exists
        $keyWord = $this->request->getPost('contactInput');
        $employee = new EmployeModel();
        $employee = $employee->getEmployee($keyWord);

        if ($employee) {
            $idEmploye = $employee['idEmploye'];
            $poste = new PosteModel();
            $posteTitle = $this->request->getPost('poste');
            $idPoste = $poste->getPosteId($posteTitle);

            $dateFin =  $this->request->getPost('dateFin');

            $dataContrat = [
                'typeContrat'   => $this->request->getPost('typeContrat'),
                'dateDebut'     => $this->request->getPost('dateDebut'),
                'dateFin'       => ($dateFin == "") ? null : $dateFin,
                'salaire'       => $this->request->getPost('salaire'),
                'lieuTravail'   => $this->request->getPost('lieuTravail'),
                'moyenPaiement' => $this->request->getPost('moyenPaiement'),
                'idEmploye'     => $idEmploye,
                'idPoste'       => $idPoste,
            ];

            // Save contrat
            $contrat = new ContratModel();
            $idContrat = $contrat->insert($dataContrat);

            //Retrieve horaire data
            $horaireInput = [
                'monday' => [
                    'startTime' => $this->request->getPost('mondayStartTime'),
                    'endTime' => $this->request->getPost('mondayEndTime'),
                ],
                'tuesday' => [
                    'startTime' => $this->request->getPost('tuesdayStartTime'),
                    'endTime' => $this->request->getPost('tuesdayEndTime'),
                ],
                'wednesday' => [
                    'startTime' => $this->request->getPost('wednesdayStartTime'),
                    'endTime' => $this->request->getPost('wednesdayEndTime'),
                ],
                'thursday' => [
                    'startTime' => $this->request->getPost('thursdayStartTime'),
                    'endTime' => $this->request->getPost('thursdayEndTime'),
                ],
                'friday' => [
                    'startTime' => $this->request->getPost('fridayStartTime'),
                    'endTime' => $this->request->getPost('fridayEndTime'),
                ],
                'saturday' => [
                    'startTime' => $this->request->getPost('saturdayStartTime'),
                    'endTime' => $this->request->getPost('saturdayEndTime'),
                ],
                'sunday' => [
                    'startTime' => $this->request->getPost('sundayStartTime'),
                    'endTime' => $this->request->getPost('sundayEndTime'),
                ],
            ];

            $horaireData['idContrat'] = $idContrat;

            //Save horaire
            $horaire = new HoraireModel();
            $horaire->addNewHoraire($horaireInput, $idContrat);

            return redirect('employee/contrat')->with('status', 'enregistrement');
        } else {

            return redirect('employee/contrat')->with('status', 'erreur');
        }
    }

    public function deleteContrat($idContrat = null)
    {
        $contrat = new ContratModel();
        $contrat->deleteContratById($idContrat);

        return redirect()->back()->with('status', 'suppression');
    }

    public function updateContrat($idContrat)
    {
        $contrat = new ContratModel();

        $poste = new PosteModel();
        $posteTitle = $this->request->getPost('poste');
        $dataContrat = [
            'typeContrat'   => $this->request->getPost('typeContrat'),
            'dateDebut'     => $this->request->getPost('dateDebut'),
            'dateFin'       => $this->request->getPost('dateFin'),
            'salaire'       => $this->request->getPost('salaire'),
            'lieuTravail'   => $this->request->getPost('lieuTravail'),
            'moyenPaiement' => $this->request->getPost('moyenPaiement'),
            'idPoste'       => $poste->getPosteId($posteTitle),
        ];

        $contrat->update($idContrat, $dataContrat);

        // Update schedule
        $horaireInput = [
            'monday' => [
                'startTime' => $this->request->getPost('mondayStartTime'),
                'endTime' => $this->request->getPost('mondayEndTime'),
            ],
            'tuesday' => [
                'startTime' => $this->request->getPost('tuesdayStartTime'),
                'endTime' => $this->request->getPost('tuesdayEndTime'),
            ],
            'wednesday' => [
                'startTime' => $this->request->getPost('wednesdayStartTime'),
                'endTime' => $this->request->getPost('wednesdayEndTime'),
            ],
            'thursday' => [
                'startTime' => $this->request->getPost('thursdayStartTime'),
                'endTime' => $this->request->getPost('thursdayEndTime'),
            ],
            'friday' => [
                'startTime' => $this->request->getPost('fridayStartTime'),
                'endTime' => $this->request->getPost('fridayEndTime'),
            ],
            'saturday' => [
                'startTime' => $this->request->getPost('saturdayStartTime'),
                'endTime' => $this->request->getPost('saturdayEndTime'),
            ],
            'sunday' => [
                'startTime' => $this->request->getPost('sundayStartTime'),
                'endTime' => $this->request->getPost('sundayEndTime'),
            ],
        ];

        $horaire =  new HoraireModel();
        $horaire->updateHoraire($horaireInput, $idContrat);
        
        return redirect('employee/contrat')->with('status', 'modification');
    }
}
