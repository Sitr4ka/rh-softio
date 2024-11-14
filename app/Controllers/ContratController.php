<?php

namespace App\Controllers;

use App\Models\ContratModel;
use App\Models\EmployeModel;
use App\Models\HoraireModel;

use App\Controllers\BaseController;
use App\Models\PosteModel;

class ContratController extends BaseController
{
    public function index()
    {
        $user = session()->get('user');
        $currentDate = date('Y-m-d');
        if (!$user) {
            return redirect()->back()->with('status', "Vous n'êtes pas connecté");
        }

        $contrat = new ContratModel();
        $postes = new PosteModel();

        $data = [
            'user'      => $user,
            'currentDate' => $currentDate,
            'contrats' => $contrat->getAll(),
            'postes' => $postes->getAll()

        ];

        return view('employee/contrat', $data);
    }

    public function add()
    {
        //Employee Checking
        $employee = new EmployeModel();
        $email = $this->request->getPost('email');
        $employee = $employee->where('email', $email)->first();

        if ($employee) {
            //Get the employee ID
            $idEmploye = $employee['idEmploye'];

            //Get the poste ID
            $poste = new PosteModel();
            $posteTitle = $this->request->getPost('poste');
            $poste = $poste->where('poste', $posteTitle)->first();
            $idPoste = $poste['idPoste'];

            //Get the contrat data
            $dataContrat = [
                'typeContrat'   => $this->request->getPost('typeContrat'),
                'dateDebut'     => $this->request->getPost('dateDebut'),
                'dateFin'       => $this->request->getPost('dateFin'),
                'salaire'       => $this->request->getPost('salaire'),
                'lieuTravail'   => $this->request->getPost('lieuTravail'),
                'moyenPaiement' => $this->request->getPost('moyenPaiement'),
                'idEmploye'     => $idEmploye,
                'idPoste'       => $idPoste,
            ];

            //Saving Contrat data and get its id
            $contrat = new ContratModel();
            $idContrat = $contrat->insert($dataContrat);

            //Get Horaire data
            $daysData = [];
            
            $daysInput = [
                'mon' => $this->request->getPost('monday'),
                'tue' => $this->request->getPost('tuesday'),
                'wed' => $this->request->getPost('wednesday'),
                'thu' => $this->request->getPost('thursday'),
                'fri' => $this->request->getPost('friday'),
                'sat' => $this->request->getPost('saturday'),
                'sun' => $this->request->getPost('sunday')
            ];
            
            foreach ($daysInput as $key => $value) {
                if ($value) {
                    switch ($key) {
                        case 'mon':
                            $daysData[] = 'Lundi';
                            break;
                        case 'tue':
                            $daysData[] = 'Mardi';
                            break;
                        case 'wed':
                            $daysData[] = 'Mercredi';
                            break;
                        case 'thu':
                            $daysData[] = 'Jeudi';
                            break;
                        case 'fri':
                            $daysData[] = 'Vendredi';
                            break;
                        case 'sat':
                            $daysData[] = 'Samedi';
                            break;
                        case 'sun':
                            $daysData[] = 'Dimanche';
                            break;
                    }
                }
            }

            $dataHoraire = [
                'heureDebut' => $this->request->getPost('startTime'),
                'heureFin' => $this->request->getPost('endTime'),
                'idContrat' => $idContrat,
            ];

            foreach ($daysData as $day) {
                $dataHoraire['jours'] = $day;
                $horaire = new HoraireModel();
                $horaire->save($dataHoraire);
            }

            return redirect('employee/contrat')->with('status', 'enregistrement');
        } else {
            return redirect('employee/contrat')->with('status', 'erreur');
        }
    }
}
