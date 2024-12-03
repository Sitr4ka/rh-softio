<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Stmt\Return_;

class PointageModel extends Model
{
    protected $table            = 'pointages';
    protected $primaryKey       = 'idPointage';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'date',
        'heureEntree',
        'heureSortie',
        'observation',
        'idEmploye'
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
     * 
     */
    function getScoringById(int $idEmploye, string $date)
    {
        return $this
            ->where('idEmploye', $idEmploye)
            ->where('date', $date)
            ->first();
    }

    /**
     * 
     */
    function getScoringByDays(string $date)
    {
        return $this->where('date', $date)->findAll();
    }

    /**
     * @return array scoring filter by an interval of date
     */
    function getAllScoringById(int $idEmploye, string $startDate, string $endDate)
    {
        return $this
            ->where('idEmploye', $idEmploye)
            ->where('date >=', $startDate)
            ->where('date <=', $endDate)
            ->findAll()
        ;
    }

    /**
     * 
     */
    function getScoringByDate(int $idEmploye, string $date)
    {

        return $this->where('idEmploye', $idEmploye)
            ->where('date', $date)
            ->first();
    }
}
