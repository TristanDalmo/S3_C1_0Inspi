<?php

namespace Service\GestionFormulaire;

require_once(__DIR__ . "/../../DAO/GestionFormulaire/InsertionEDLDAO.php");
use DAO\GestionFormulaire\InsertionEDLDAO;
require_once(__DIR__ . "/I_InsertionEDLService.php");
use Service\GestionFormulaire\I_InsertionEDLService;


/**
 * Classe servant à insérer des données dans la base de données
 */
class InsertionEDLService implements I_InsertionEDLService {

    public function InsererEDL(array $donnees) {
        (new InsertionEDLDAO())->InsererEDL($donnees);
    }
}





?>