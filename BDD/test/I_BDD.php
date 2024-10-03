<?php

interface I_BDD {
    /**
     * Initialise la connexion à la base de données.
     */
    public static function init();

    /**
     * Insère les donnees des donnees dans la table.
     * info du type de la table
     */
    public static function insertTable($info);

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