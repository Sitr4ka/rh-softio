<?php

namespace App\Models;

use CodeIgniter\Model;

class HoraireModel extends Model
{
    protected $table            = 'horaires';
    protected $primaryKey       = 'idHoraire';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'jours',
        'heureDebut',
        'heureFin',
        'idContrat'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * @param array $horaire contains startTime end endTime, array
     * @return void
     */
    function addNewHoraire(array $horaire, int $idContrat)
    {
        foreach ($horaire as $day => $time) {
            if (!($time['endTime'] == ""  || $time['startTime'] == "")) {
                $horaireData = [
                    'jours'     => $this->getDaysName($day),
                    'heureDebut'=> $time['startTime'],
                    'heureFin'  => $time['endTime'],
                    'idContrat' => $idContrat
                ];

                $this->save($horaireData);
            }
        };
    }

    /**
     * @param string days 
     * @return string a new days in french
     */
    function getDaysName(string $day)
    {
        switch ($day) {
            case 'monday':
                $newDay = 'Lundi';
                break;

            case 'tuesday':
                $newDay = 'Mardi';
                break;

            case 'wednesday':
                $newDay = 'Mercredi';
                break;

            case 'thursday':
                $newDay = 'Jeudi';
                break;

            case 'friday':
                $newDay = 'Vendredi';
                break;

            case 'saturday':
                $newDay = 'Samedi';
                break;

            case 'sunday':
                $newDay = 'Dimanche';
                break;
        }
        return $newDay;
    }
}
