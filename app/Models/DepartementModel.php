<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\PosteModel;

class DepartementModel extends Model
{
    protected $table            = 'departements';
    protected $primaryKey       = 'idDepart';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'libelleDepart'
    ];

    /**
     * Get all Departements
     * @return Departement
     */
    function getAll()
    {
        return $this->findAll();
    }

    /**
     * Delete Department
     * @return void
     */
    function deleteDepartById(int $idDepart)
    {
        $postes = new PosteModel();
        $postes = $postes->findAllByDepart($idDepart);

        foreach ($postes as $poste) {
            $idPoste = $poste['idPoste'];
            $newPoste = new PosteModel();
            $newPoste->deletePosteById($idPoste);
        }

        return $this->delete($idDepart);
    }
}
