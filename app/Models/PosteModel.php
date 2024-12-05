<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ContratModel;

class PosteModel extends Model
{
    protected $table            = 'postes';
    protected $primaryKey       = 'idPoste';
    protected $allowedFields    = [
        'poste', 'idDepart'
    ];

    function getAll()
    {
        return $this
        ->select('postes.idPoste, postes.poste , postes.idDepart , departements.libelleDepart')
        ->join('departements', 'departements.idDepart = postes.idDepart')
        ->paginate(5);
    }


    /**
     * @param string poste title
     * @return int idPoste
     */
    function getPosteId(string $poste) 
    {
        $temp = $this->where('poste', $poste)->first();
        return $temp['idPoste'];
    }

    /**
     * 
     */
    function getPosteById(int $id) {
        return $this->builder()
        ->select('postes.idPoste, postes.poste , postes.idDepart , departements.libelleDepart')
        ->join('departements', 'departements.idDepart = postes.idDepart')
        ->where('idPoste', $id)
        ->get()
        ->getResult();
    }

    /**
     * Delete Poste By ID
     * @return void
     */
    function deletePosteById(int $idPoste) {
        $contrats = new ContratModel();
        $contrats = $contrats->findAllByPoste($idPoste);

        foreach ($contrats as $contrat) {
            $idContrat = $contrat['idContrat'];
            $newContrat = new ContratModel();
            $newContrat->deleteContratById($idContrat);
        }
        
        return $this->delete($idPoste);
    }

    /**
     * Delete Poste By Depart ID
     * @return Poste
     */
    function findAllByDepart(int $idDepart) {
        return $this->where('idDepart', $idDepart)->findAll();
    }

    /**
     *
     */
}
