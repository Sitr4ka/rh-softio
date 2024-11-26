<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeModel extends Model
{
    protected $table            = 'employes';
    protected $primaryKey       = 'idEmploye';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
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

    // Methods
    function getAll()
    {
        return $this->findAll();
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

        return $this->select('employes.idEmploye, employes.nom, contrats.typeContrat, postes.poste')
            ->join('contrats', 'contrats.idEmploye = employes.idEmploye')
            ->join('horaires', 'contrats.idContrat = horaires.idContrat')
            ->join('postes', 'contrats.idPoste = postes.idPoste')
            ->like('horaires.jours', $day)
            ->findAll();
    }
}