<?php

namespace DAO\EtatDesLieux;
require_once(__DIR__."../../Model/Logement.php");
use Model\Logement;

/**
 * Interface pour la classe DAO de la table Logement
 */
interface I_LogementDAO {
    /**
     * Méthode permettant de créer un logement dans la BDD
     * @param \Model\Logement $logement Logement à insérer
     * @return string Message d'erreur ou de succès 
     */
    public function Create(Logement $logement) : string;

    /**
     * Méthode permettant de mettre à jour un logement dans la BDD
     * @param \Model\Logement $logement Logement à mettre à jour
     * @return string Message d'erreur ou de succès
     */
    public function Update(Logement $logement): string;

    /**
     * Méthode permettant d'effacer un logement
     * @param int $id id du logement à supprimer
     * @return string Message d'erreur ou de succès
     */
    public function Delete(int $id): string;

    /**
     * Méthode permettant d'obtenir un logement via son id
     * @param int $id id du logement
     * @return \Model\Logement Logement obtenu avec l'id
     */
    public function GetById(int $id):Logement;
}