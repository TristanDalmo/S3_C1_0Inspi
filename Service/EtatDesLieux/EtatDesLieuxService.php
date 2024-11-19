<?php

use DAO\EtatDesLieuxDAO\EtatDesLieuxDAO;
use Model\EtatDesLieux;
use Model\Logement;

class EtatDesLieuxService implements I_EtatDesLieuxService
{
    public function create(EtatDesLieux $edl)
    {
        $edlDao = new EtatDesLieuxDAO();
        $edlDao->Create($edl);
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