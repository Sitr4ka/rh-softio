<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\HoraireModel;

class ContratModel extends Model
{
    protected $table            = 'contrats';
    protected $primaryKey       = 'idContrat';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'typeContrat',
        'dateDebut',
        'dateFin',
        'salaire',
        'lieuTravail',
        'moyenPaiement',
        'idEmploye',
        'idPoste'
    ];

    // Methods
    function getAll()
    {
        return $this->findAll();
    }

    function getWithPositionHired()
    {
        $newContrats = new ContratModel();
        $newContrats = $newContrats
            ->join('postes', 'contrats.idPoste = postes.idPoste')
            ->findAll();

        $horaires = new HoraireModel();
        foreach ($newContrats as &$contrat) {
            $horaireData = $horaires->where('idContrat', $contrat['idContrat'])->getAll();
            $contrat["horaires"] = $horaireData;
        }

        return $newContrats;
    }

    /**
     * 
     */
    function getContratByHoraire(string $days)
    {
        $contrats =
            $this->select('contrats.idContrat')
            ->join('horaires', 'contrats.idContrat = horaires.idContrat')
            ->where('horaires.jours', $days)
            ->findAll();

        return $contrats;
    }

    /**
     * delete Contrat
     * @param int idContrat
     * @return void
     */
    function deleteContratById($idContrat)
    {
        $horaire = new HoraireModel();
        $horaire = $horaire->where('idContrat', $idContrat)->delete();

        return $this->delete($idContrat);
    }

    /**
     * Find all contrats by poste ID
     * @return Contrats
     */
    function findAllByPoste(int $idPoste)
    {
        return $this->where('idPoste', $idPoste)->findAll();
    }
}
