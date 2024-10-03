<?php

/**
 * Interface d'état des lieux
 */
interface I_EtatDesLieuxDAO {
    /** 
     * Initialise la connexion à la base de données.
     */
    public static function init();

    /**
     * Insère un nouvel état des lieux dans la table.
     * 
     * @param EtatDesLieux $etatDesLieux L'objet EtatDesLieux à insérer
     */
    public static function insertTable($etatDesLieux);

    /**
     * Affiche le contenu d'une table spécifiée.
     * 
     * @param string $tableName Le nom de la table à afficher
     */
    public static function afficherContenuTable($tableName);

    /**
     * Ferme la connexion à la base de données.
     */
    public static function closeConnection();
}

?>