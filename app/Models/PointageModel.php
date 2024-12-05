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
     * Get All Scoring By Date
     * @return Pointage
     */
    function getScoringByDays(string $date)
    {
        return $this->where('date', $date)->findAll();
    }

    /**
     * Get all scoring according to the filter (startDate, endDate, contact)
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
