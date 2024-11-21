<?php

namespace Service\EtatDesLieux;
require_once(__DIR__ . "/../../DAO/EtatDesLieux/EtatDesLieuxDAO.php");
require_once(__DIR__ . "/../../Model/EtatDesLieux.php");
use DAO\EtatDesLieux\EtatDesLieuxDAO;
use Model\EtatDesLieux;
require_once(__DIR__ . "/I_EtatDesLieuxSevice.php");
use Service\EtatDesLieux\I_EtatDesLieuxService;

/**
 * Couche service servant aux méthodes liées à la table Etat des Lieux
 */
class EtatDesLieuxService implements I_EtatDesLieuxService
{
    public function create(EtatDesLieux $edl): int
    {
        $edlDao = new EtatDesLieuxDAO();
        return $edlDao->Create($edl);
    }
    public function update(EtatDesLieux $edl)
    {
        $edlDao = new EtatDesLieuxDAO();
        $edlDao->Update($edl);
    }
    public function delete(int $id)
    {
        $edlDao = new EtatDesLieuxDAO();
        $edlDao->Delete($id);
    }
    public function getById(int $id): EtatDesLieux
    {
        $edlDao = new EtatDesLieuxDAO();
        return $edlDao->getById($id);

    }
} 
?>