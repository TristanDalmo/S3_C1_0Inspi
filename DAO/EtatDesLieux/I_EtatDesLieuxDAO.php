<?php

namespace DAO\EtatDesLieux;
require_once(__DIR__."../../Model/Piece.php");
use Model\EtatDesLieux;

/**
 * Interface pour la classe DAO de la table Etat des lieux
 */
interface I_EtatDesLieuxDAO {
    /**
     * Méthode permettant de créer un état des lieux dans la BDD
     * @param \Model\EtatDesLieux $etatDesLieux état des lieux à insérer
     * @return string Message d'erreur ou de succès 
     */
    public function Create(EtatDesLieux $etatDesLieux) : string;

    /**
     * Méthode permettant de mettre à jour un état des lieux dans la BDD
     * @param \Model\EtatDesLieux $etatDesLieux Etat des lieux à mettre à jour
     * @return string Message d'erreur ou de succès
     */
    public function Update(EtatDesLieux $etatDesLieux): string;

    /**
     * Méthode permettant d'effacer un état des lieux 
     * @param int $id id de l'état des lieux à supprimer
     * @return string Message d'erreur ou de succès
     */
    public function Delete(int $id): string;

    /**
     * Méthode permettant d'obtenir un état des lieux via son id
     * @param int $id id de l'état des lieux
     * @return \Model\EtatDesLieux l'etat des lieux obtenu avec l'id
     */
    public function GetById(int $id):EtatDesLieux;
}