<?php

namespace Service\EtatDesLieux;
require_once(__DIR__ . "/../../DAO/EtatDesLieux/LocataireDAO.php");
use DAO\EtatDesLieux\LocataireDAO;

require_once(__DIR__ ."../../Model/Locataire.php");
use Model\Locataire;
require_once(__DIR__ ."../../Service/EtatDesLieux/I_LocataireService.php");
use Service\EtatDesLieux\I_LocataireService;

/**
 * Couche service servant aux méthodes liées à la table Locataire
 */
class LocataireService implements I_LocataireService{

    public function create(Locataire $locataire)
    {
        $daoLocataire = new LocataireDAO();
        $daoLocataire->create($locataire);
    }
    public function delete(int $id,int $id2)
    {
        $daoLocataire = new LocataireDAO();
        $daoLocataire->delete($id,$id2);
    }
    public function getById(int $id,int $id2): Locataire
    {
        $daoLocataire = new LocataireDAO();
        return $daoLocataire->getById($id,$id2);
    }
}

?>