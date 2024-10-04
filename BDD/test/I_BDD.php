<?php

interface I_BDD {
    

    /**
     * Insère les donnees des donnees dans la table.
     * info du type de la table
     */
    public  static function insertTable($info);

    /**
     * Supprime une ligne de la base de données via l'id
     */
    public  static function DeleteTable(int $id);

    /**
     * Met à jour les données de la base de données souhaité via la classe liée à la table
     */
    public static function updateTable($info);
}

?>