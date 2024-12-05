<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeModel extends Model
{
    protected $table            = 'employes';
    protected $primaryKey       = 'idEmploye';
    protected $allowedFields    = [
        'nom',
        'prenoms',
        'adresse',
        'contact',
        'email',
        'numeroCin',
        'dateCin',
        'lieuCin',
        'nationalite',
        'etatCivil',
        'nomUrgence',
        'contactUrgence',
        'relationUrgence',
        'classification',
        'statut'
    ];

    // Methods
    function getAll()
    {
        return $this->paginate(5);
    }

    /**
     * @param string email
     * @return array Employe
     */
    function getEmployee(string $keyWord)
    {
        return $this->where('email', $keyWord)
            ->orWhere('contact', $keyWord)
            ->first();
    }

    /**
     * Fetch employees by selected day
     * 
     * @param string $day
     */
    public function getEmployeesByDay($day)
    {

        return $this->builder()
            ->distinct()
            ->select(' employes.idEmploye, employes.nom, employes.prenoms, employes.contact')
            ->join('contrats', 'contrats.idEmploye = employes.idEmploye')
            ->join('horaires', 'contrats.idContrat = horaires.idContrat')
            ->join('postes', 'contrats.idPoste = postes.idPoste')
            ->like('horaires.jours', $day)
            ->get()
            ->getResultArray();
    }
}
