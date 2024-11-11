<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoProModel extends Model
{
    protected $table            = 'InfoPros';
    protected $primaryKey       = 'idInfoPro';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'employeeNumber',
        'contractType',
        'classification',
        'hireDate',
        'contractEndDate',
        'status',
        'department',
        'workLocation',
        'positionHeld',
        'idInfoPerso',
        'workingHours',
        'baseSalary',
        'paymentType'
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
}
