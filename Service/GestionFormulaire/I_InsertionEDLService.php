<?php

namespace Service\GestionFormulaire;


/**
 * Interface servant à insérer des données dans la base de données
 */
interface I_InsertionEDLService {

    /**
     * Méthode permettant d'insérer un état des lieux dans la base de données
     * @param array $donnees Données à insérer
     * @return void
     */
    public function InsererEDL(array $donnees);
}





?>