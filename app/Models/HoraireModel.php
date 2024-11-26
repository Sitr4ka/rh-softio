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

    function getAll() 
    {
        return $this->findAll();
    }


    /**
     * @param array horaire contains startTime and endTime
     * @param int contract identifiant
     * @return void
     */
    function addNewHoraire(array $horaire, int $idContrat)
    {
        foreach ($horaire as $day => $time) {
            if (!($time['endTime'] == ""  || $time['startTime'] == "")) {
                $horaireData = [
                    'jours' => getFrenchDayName($day),
                    'heureDebut' => $time['startTime'],
                    'heureFin'  => $time['endTime'],
                    'idContrat' => $idContrat
                ];

                $this->save($horaireData);
            }
        };
    }

    /**
     * @param array horaire contains startTime and endTime
     * @param int contract identifiant
     * @return void
     */
    function updateHoraire(array $horaire, int $idContrat)
    {
        foreach ($horaire as $day => $time) {
            if (!($time['endTime'] == ""  || $time['startTime'] == "")) {

                $horaireData = [
                    'jours'     => getFrenchDayName($day),
                    'heureDebut' => $time['startTime'],
                    'heureFin'  => $time['endTime'],
                    'idContrat' => $idContrat
                ];

                $idHoraire = null;
                if ($idHoraire = $this->getHoraireId($idContrat, $day)) {
                    $this->update($idHoraire, $horaireData);
                } else {
                    $this->save($horaireData);
                }

            }
        }
    }

    /**
     * @param int idContrat
     * @param string day
     * @return int id
     */
    function getHoraireId($idContrat, $day)
    {
        $horaire =  $this
            ->where('jours', $day)
            ->where('idContrat', $idContrat)
            ->first();

        if ($horaire) {
            return $horaire['idHoraire'];
        } else {
            return null;
        }
    }

    function getHoraireByContrat($idContrat) 
    {
        return $this->where('idContrat', $idContrat);
    }
}
