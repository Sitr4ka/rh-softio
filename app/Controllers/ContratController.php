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
        //check if employee exists
        $employee = new EmployeModel();
        $email = $this->request->getPost('email');
        $employee = $employee->where('email', $email)->first();

        if ($employee) {
            //Retrieve employee ID
            $idEmploye = $employee['idEmploye'];

            //Retrieve poste ID
            $poste = new PosteModel();
            $posteTitle = $this->request->getPost('poste');
            $poste = $poste->where('poste', $posteTitle)->first();
            $idPoste = $poste['idPoste'];

            //Retrieve contract data
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

            //Save contract data and retrieve ID
            $contrat = new ContratModel();
            $idContrat = $contrat->insert($dataContrat);

            //Retrieve working hours and days
            $daysInput = [
                'mon' => $this->request->getPost('monday'),
                'tue' => $this->request->getPost('tuesday'),
                'wed' => $this->request->getPost('wednesday'),
                'thu' => $this->request->getPost('thursday'),
                'fri' => $this->request->getPost('friday'),
                'sat' => $this->request->getPost('saturday'),
                'sun' => $this->request->getPost('sunday')
            ];
            $daysData = $this->saveDate($daysInput);
            $workingHoursData = [
                'heureDebut' => $this->request->getPost('startTime'),
                'heureFin' => $this->request->getPost('endTime'),
                'idContrat' => $idContrat,
            ];
            
            foreach ($daysData as $day) {
                $workingHoursData['jours'] = $day;
                $horaire = new HoraireModel();
                $horaire->save($workingHoursData);
            }

            return redirect('employee/contrat')->with('status', 'enregistrement');
        } else {
            return redirect('employee/contrat')->with('status', 'erreur');
        }
    }

    public function deleteContrat($idContrat = null)
    {

        // Delete shedule
        $horaire = new HoraireModel();
        $horaire = $horaire->where('idContrat', $idContrat)->delete();

        // Delete contract
        $contrat = new ContratModel();
        $contrat->delete($idContrat);

        return redirect()->back()->with('status', 'suppression');
    }



    /**
     * @param array $days days values
     * @return array a new array that contains the appropriate values of days
     */
    public function saveDate(array $days)
    {
        $newArray = [];
        foreach ($days as $key => $value) {
            if ($value) {
                switch ($key) {
                    case 'mon':
                        $newArray[] = 'Lundi';
                        break;
                    case 'tue':
                        $newArray[] = 'Mardi';
                        break;
                    case 'wed':
                        $newArray[] = 'Mercredi';
                        break;
                    case 'thu':
                        $newArray[] = 'Jeudi';
                        break;
                    case 'fri':
                        $newArray[] = 'Vendredi';
                        break;
                    case 'sat':
                        $newArray[] = 'Samedi';
                        break;
                    case 'sun':
                        $newArray[] = 'Dimanche';
                        break;
                }
            }
        }
        return $newArray;
    }
}
