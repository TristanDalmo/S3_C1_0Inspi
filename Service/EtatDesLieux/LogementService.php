<?php

use Model\Logement;

use DAO\EtatDesLieux;
use DAO\EtatDesLieux\LogementDAO;

class LogementService implements I_LogementService
{
    public function create(Logement $logement)
    {
        $logementdao = new LogementDAO();
        $logementdao->Create($logement);

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