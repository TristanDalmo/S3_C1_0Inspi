<?php

namespace Service\EtatDesLieux;
require_once(__DIR__ . "/../../Model/Logement.php");
use Model\Logement;
require_once(__DIR__ . "/../../DAO/EtatDesLieux/LogementDAO.php");
use DAO\EtatDesLieux\LogementDAO;

/**
 * Couche service servant aux méthodes liées à la table Logement
 */
class LogementService implements I_LogementService
{
    public function create(Logement $logement) : int
    {
        $logementdao = new LogementDAO();
        return $logementdao->Create($logement);
    }
    public function update(Logement $logement)
    {
        $logementdao = new LogementDAO();
        $logementdao->Update($logement);
    }
    public function delete(int $id)
    {
        $logementdao = new LogementDAO();
        $logementdao->Delete($id);
    }
    public function getById(int $id): Logement
    {
        $logementdao = new LogementDAO();
        return $logementdao->getById($id);    
    }
}
?>